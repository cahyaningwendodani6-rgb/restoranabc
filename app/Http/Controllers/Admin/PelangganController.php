<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\PelangganController;
use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

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

        // === Tambahan filter status (TIDAK menghapus kode lama) ===
        $status = request()->query('status'); // ambil filter status dari query

        $query = \App\Models\Pesanan::with('menu')
            ->where('pelanggan_id', $id)
            ->orderBy('created_at', 'desc');

        if ($status && in_array($status, ['pending', 'diproses', 'diantar', 'selesai', 'batal'])) {
            $query->where('status', $status);
        }

        // hasil setelah difilter atau tidak
        $riwayat = $query->get();
        // === akhir tambahan ===

        return view('admin.pelanggan.detail', compact('pelanggans', 'riwayat', 'status'));
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
