<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class LaporanController extends Controller
{
    // Halaman laporan utama
    public function index()
    {
        $laporan = Pesanan::all()
            ->groupBy(function($item) {
                return $item->created_at->format('Y-m-d');
            })
            ->map(function($pesananPerTanggal, $tanggal) {
                $pendapatan = 0;
                foreach ($pesananPerTanggal as $p) {
                    foreach ($p->menu as $m) {
                        $pendapatan += $m->harga * $m->pivot->jumlah;
                    }
                }
                return [
                    'tanggal' => $tanggal,
                    'pendapatan' => $pendapatan,
                    'jumlah_pesanan' => $pesananPerTanggal->count()
                ];
            });

        return view('pages.laporan.index', ['laporan' => $laporan]);
    }

    // Halaman detail per tanggal
    public function detail($tanggal)
    {
        $pesanan = Pesanan::with('menu')
                    ->whereDate('created_at', $tanggal)
                    ->get();

        return view('pages.laporan.detail', compact('pesanan', 'tanggal'));
    }
}
