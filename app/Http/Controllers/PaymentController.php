<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PaymentController extends Controller
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

    public function batal($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update(['status' => 'gagal']);

        return redirect()->back()->with('success', 'Pembayaran ditolak.');
    }
}
