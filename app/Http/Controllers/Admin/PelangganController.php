<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->get();
        $jumlah = $pelanggans->count();

        return view('admin.pelanggan.index', compact('pelanggans', 'jumlah'));
    }

    public function detail($id)
    {
        $pelanggans = Pelanggan::findOrFail($id);
        $riwayat = \App\Models\Pesanan::where('user_id', $id)->latest()->get();

        return view('admin.pelanggan.detail', compact('pelanggans', 'riwayat'));
    }

    public function destroy($id)
    {
        $pelanggans = Pelanggan::findOrFail($id);
        $pelanggans->delete();

        return redirect()->route('admin.pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }

    public function detailPesanan($id)
    {
        $pesanan = \App\Models\Pesanan::with('menu')->findOrFail($id);

        return view('admin.pelanggan.detail_pesanan', compact('pesanan'));
    }
}
