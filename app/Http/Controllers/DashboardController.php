<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pembayaran;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();

        // Hanya pesanan dengan pembayaran sukses yang dihitung
        $totalPesanan = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })->count();

        $pendapatan = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })->with('menu')->get()->sum(function ($pesanan) {
            return $pesanan->menu->sum(function ($m) {
                return $m->pivot->jumlah * $m->harga;
            });
        });

        // Penjualan harian
        $penjualanHarian = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })
            ->selectRaw('DATE(created_at) as tanggal, SUM(total_harga) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        // Pesanan terbaru (hanya yang berhasil bayar)
        $pesananTerbaru = Pesanan::whereHas('pembayaran', function ($q) {
            $q->where('status', 'dibayar');
        })->latest()->take(5)->get();

        return view('pages.dashboard.index', compact(
            'totalMenu',
            'totalPesanan',
            'pendapatan',
            'penjualanHarian',
            'pesananTerbaru'
        ));
    }
}
