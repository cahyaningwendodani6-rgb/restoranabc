<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class PelangganPesananController extends Controller
{
    public function index()
    {
        // Ambil pelanggan yang sedang login
        $pelanggan = Auth::guard('pelanggan')->user();

        // Ambil semua pesanan berdasarkan pelanggan_id
        $pesanan = Pesanan::where('pelanggan_id', $pelanggan->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pelanggan.pesanan.index', compact('pesanan'));
    }

    public function show($id)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        // Cek agar pelanggan hanya bisa lihat pesanan miliknya
        $pesanan = Pesanan::where('id', $id)
            ->where('pelanggan_id', $pelanggan->id)
            ->firstOrFail();

        return view('pelanggan.pesanan.detail', compact('pesanan'));
    }

    public function konfirmasiSelesai($id)
    {
        $pesanan = Pesanan::where('id', $id)
            ->where('pelanggan_id', Auth::guard('pelanggan')->id())
            ->firstOrFail();

        if ($pesanan->status !== 'diantar') {
            return back()->with('error', 'Pesanan belum diantar.');
        }

        $pesanan->status = 'selesai';
        $pesanan->save();

        return back()->with('success', 'Pesanan telah dikonfirmasi selesai.');
    }
}
