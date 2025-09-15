<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->latest()->get();
        return view('pages.pembayaran.index', compact('pembayaran'));
    }

    public function showForm($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        return view('pages.pembayaran.form', [
            'pesanan' => $pesanan,
            'subtotal' => $pesanan->total_harga,
            'total' => $pesanan->total_harga,
        ]);
    }

    public function process(Request $request, $id)
    {
        $request->validate([
            'metode' => 'required|string'
        ]);

        $pesanan = Pesanan::findOrFail($id);

        // Simpan pembayaran
        Pembayaran::create([
            'pesanan_id' => $pesanan->id,
            'nama_pemesan' => $pesanan->nama,
            'total' => $pesanan->total_harga,
            'metode' => $request->metode,
            'status' => 'Lunas',
        ]);

        // Update pesanan
        $pesanan->update([
            'status' => 'Lunas'
        ]);

        return redirect()->route('pembayaran.form', $pesanan->id)
                         ->with('success', 'Pembayaran berhasil untuk pesanan #' . $pesanan->id);
    }
}
