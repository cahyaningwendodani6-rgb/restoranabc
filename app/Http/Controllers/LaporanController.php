<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;

class LaporanController extends Controller
{
    public function index()
    {
        // Hanya pesanan dengan pembayaran sukses
        $laporan = Pesanan::with(['menu', 'pembayaran'])
            ->whereHas('pembayaran', function ($q) {
                $q->where('status', 'dibayar');
            })
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('Y-m-d');
            })
            ->map(function ($pesananPerTanggal, $tanggal) {
                return [
                    'tanggal' => $tanggal,
                    'pendapatan' => $pesananPerTanggal->sum(function ($pesanan) {
                        return $pesanan->menu->sum(function ($menu) {
                            return $menu->pivot->jumlah * $menu->harga;
                        });
                    }),
                    'jumlah_pesanan' => $pesananPerTanggal->count(),
                ];
            })
            ->sortByDesc('tanggal') // 🔹 urutkan berdasarkan tanggal terbaru
            ->values();

        return view('pages.laporan.index', compact('laporan'));
    }

    public function detail($tanggal)
    {
        $data = Pembayaran::with('pesanan') // ambil relasi pesanan
            ->whereDate('created_at', $tanggal)
            ->where('status', 'dibayar')
            ->get();

        return view('pages.laporan.detail', compact('data', 'tanggal'));
    }

    public function harian()
    {
        $laporan = Pesanan::selectRaw('DATE(created_at) as tanggal')
            ->selectRaw('SUM(total_harga) as pendapatan')
            ->selectRaw('COUNT(*) as jumlah_pesanan')
            ->whereHas('pembayaran', function ($q) {
                $q->where('status', 'dibayar');
            })
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pages.laporan.harian', compact('laporan'));
    }

    public function mingguan()
    {
        $pesanan = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })
            ->orderBy('created_at')
            ->get();

        // Kelompokkan berdasarkan 'weekOfMonth'
        $laporan = $pesanan->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->created_at)->format('Y-m').'-'.
                   \Carbon\Carbon::parse($item->created_at)->weekOfMonth;
        })->map(function ($group) {

            $firstDate = $group->min('created_at');
            $lastDate = $group->max('created_at');

            return [
                'minggu' => \Carbon\Carbon::parse($firstDate)->weekOfMonth,
                'dari' => date('Y-m-d', strtotime($firstDate)),
                'sampai' => date('Y-m-d', strtotime($lastDate)),
                'pendapatan' => $group->sum('total_harga'),
                'jumlah_pesanan' => $group->count(),
            ];
        })->values();

        return view('pages.laporan.mingguan', compact('laporan'));
    }

    public function bulanan()
    {
        // Ambil hanya pesanan yang sudah dibayar
        $pesanan = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })
            ->orderBy('created_at')
            ->get();

        // Kelompokkan berdasarkan bulan (format: 2025-06)
        $laporan = $pesanan->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->created_at)->format('Y-m');
        })
            ->map(function ($group, $key) {

                $firstDate = $group->min('created_at');
                $lastDate = $group->max('created_at');

                return [
                    'bulan' => $key,
                    'nama_bulan' => \Carbon\Carbon::parse($key.'-01')->translatedFormat('F Y'),

                    // total pendapatan dari kolom total_harga
                    'pendapatan' => $group->sum('total_harga'),

                    // jumlah pesanan
                    'jumlah_pesanan' => $group->count(),

                    // tanggal awal & akhir bulan berdasarkan data
                    'dari' => date('Y-m-d', strtotime($firstDate)),
                    'sampai' => date('Y-m-d', strtotime($lastDate)),
                ];
            })
            ->sortByDesc('bulan')
            ->values();

        return view('pages.laporan.bulanan', compact('laporan'));
    }

    public function tahunan()
    {
        // Ambil hanya pesanan yang sudah dibayar
        $pesanan = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })
            ->orderBy('created_at')
            ->get();

        // Kelompokkan berdasarkan tahun
        $laporan = $pesanan->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->created_at)->format('Y');
        })
            ->map(function ($group, $tahun) {

                $firstDate = $group->min('created_at');
                $lastDate = $group->max('created_at');

                return [
                    'tahun' => $tahun,

                    // total pendapatan dari total_harga pesanan
                    'pendapatan' => $group->sum('total_harga'),

                    // jumlah pesanan
                    'jumlah_pesanan' => $group->count(),

                    // tanggal pertama & terakhir di tahun itu
                    'dari' => date('Y-m-d', strtotime($firstDate)),
                    'sampai' => date('Y-m-d', strtotime($lastDate)),
                ];
            })
            ->sortByDesc('tahun')
            ->values();

        return view('pages.laporan.tahunan', compact('laporan'));
    }
}
