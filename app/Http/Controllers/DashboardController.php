<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung ringkasan
        $totalMenu = Menu::count();
        $totalPesanan = Pesanan::count();

        // Ambil pendapatan dari tabel pembayaran
        $pendapatan = Pembayaran::sum('total');

        $pesananTerbaru = Pesanan::with(['menu' => function ($q) {
            $q->distinct();
        }])->latest()->take(5)->get();

        // Data untuk grafik harian (ambil dari pembayaran, bukan pesanan)
        $penjualanHarian = Pembayaran::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'ASC')
            ->get();

        return view('pages.dashboard.index', compact(
            'totalMenu',
            'totalPesanan',
            'pendapatan',
            'pesananTerbaru',
            'penjualanHarian'
        ));
    }
    
}


