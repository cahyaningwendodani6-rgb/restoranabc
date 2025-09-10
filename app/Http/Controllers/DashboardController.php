<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung ringkasan
        $totalMenu = Menu::count();
        $totalPesanan = Pesanan::count();
        $pendapatan = Pesanan::sum('total_harga');
        $pesananTerbaru = Pesanan::with(['menu' => function ($q) {
            $q->distinct();
        }])->latest()->take(5)->get();

        // Data untuk grafik harian
        $penjualanHarian = Pesanan::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(total_harga) as total')
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
