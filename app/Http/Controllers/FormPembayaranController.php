<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class FormPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->orderBy('id', 'desc')->get();
        return view('pages.payment.index', compact('pembayaran'));
    }

    public function verifikasi($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update(['status' => 'dibayar']);

        return redirect()->back()->with('success', 'Pembayaran sudah diverifikasi.');
    }

    public function tolak($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = 'gagal';
        $pembayaran->save();

        return redirect()->back()->with('error', 'Pembayaran ditolak dan tidak dihitung ke dashboard!');
    }


    public function store(Request $request, $pesananId)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pesanan = Pesanan::findOrFail($pesananId);

        // Simpan file bukti
        $fileName = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('uploads/bukti'), $fileName);

        // Simpan pembayaran
        Pembayaran::create([
            'pesanan_id' => $pesanan->id,
            'metode' => 'qris',
            'status' => 'pending',
            'bukti' => $fileName,
        ]);

        // Update status pesanan juga kalau perlu
        $pesanan->update(['status' => 'menunggu_verifikasi']);

        // Tambahkan flash message
        return redirect()->back()->with('success', 'Pembayaran berhasil dikirim, tunggu verifikasi admin.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('pesanan')->findOrFail($id);
        return view('pages.payment.show', compact('pembayaran'));
    }

}
