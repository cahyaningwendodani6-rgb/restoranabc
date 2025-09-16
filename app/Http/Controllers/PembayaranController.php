<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->orderBy('created_at', 'desc')->get();
        return view('pages.pembayaran.index', compact('pembayaran'));
    }

    public function form($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pages.pembayaran.form', compact('pesanan'));
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

    public function store(Request $request, $pesananId)
    {
        $pesanan = Pesanan::with('pembayaran')->findOrFail($pesananId);

        $request->validate([
            'metode' => 'required|string',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // kalau ada upload bukti (transfer)
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti_pembayaran', 'public');
        }

        // update atau buat pembayaran
        if ($pesanan->pembayaran) {
            $pesanan->pembayaran->update([
                'metode' => strtolower($request->metode),
                'bukti'  => $buktiPath,
                'status' => $buktiPath ? 'pending' : 'pending',
            ]);
        } else {
            $pesanan->pembayaran()->create([
                'metode' => strtolower($request->metode),
                'bukti'  => $buktiPath,
                'status' => $buktiPath ? 'pending' : 'pending',
            ]);
        }

        return redirect()->route('pesanan.struk', $pesananId)
            ->with('success', 'Pembayaran berhasil dikirim, menunggu verifikasi.');
    }

    public function verifikasi($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update(['status' => 'dibayar']);

        return back()->with('success', 'Pembayaran sudah diverifikasi.');
    }

    public function uploadBukti(Request $request, $id)
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
            'status' => 'pending',
        ]);

        // Update pesanan
        $pesanan->update([
            'status' => 'Lunas'
        ]);

        return redirect()->route('pembayaran.form', $pesanan->id)
            ->with('success', 'Pembayaran berhasil untuk pesanan #' . $pesanan->id);
    }

    public function tolak($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update(['status' => 'gagal']); // atau 'ditolak'

        return back()->with('error', 'Pembayaran ditolak.');
    }


}
