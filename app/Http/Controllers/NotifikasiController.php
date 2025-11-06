<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pembayaran;

class NotifikasiController extends Controller
{
    public function getCounts()
    {
        $pesanan = Pesanan::where('status', 'pending')->count();
        $pembayaran = Pembayaran::where('status', 'pending', 'Menunggu Verifikasi')->count();

        return response()->json([
            'pesanan' => $pesanan,
            'pembayaran' => $pembayaran,
        ]);
    }
}
