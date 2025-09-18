<?php

namespace App\Http\Controllers;

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
            ->values();

        return view('pages.laporan.index', compact('laporan'));
    }

    public function detail($tanggal)
    {
        // Detail hanya pesanan dengan pembayaran sukses
        $pesanan = Pesanan::with(['menu', 'pembayaran'])
            ->whereHas('pembayaran', function ($q) {
                $q->where('status', 'dibayar');
            })
            ->whereDate('created_at', $tanggal)
            ->get();

        return view('pages.laporan.detail', compact('pesanan', 'tanggal'));
    }
}
