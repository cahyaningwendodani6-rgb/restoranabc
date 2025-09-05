<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Menu;

class FormPesananController extends Controller
{
    public function index()
    {
        return view('pages.formpesanan.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required',
            'telp'              => 'nullable',
            'email'             => 'nullable|email',
            'alamat'            => 'nullable',
            'pesanan'           => 'required',
            'metode_pembayaran' => 'required',
            'catatan'           => 'nullable',
            'total_harga'       => 'required|numeric',
        ]);

        Pesanan::create($request->all());
        return redirect()->route('formpesanan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

}