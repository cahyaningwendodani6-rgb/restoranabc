<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Menu;

class FormPesananController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('id', 'asc')->get();
        $pesanan = Pesanan::with('menu')
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.formpesanan.index', compact('menu', 'pesanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required',
            'telp'              => 'required',
            'email'             => 'nullable|email',
            'alamat'            => 'required',
            'menu_id'           => 'required|array',
            'menu_id.*'         => 'exists:menu,id',
            'metode_pembayaran' => 'required',
            'catatan'           => 'nullable',
            'total_harga'       => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi',
            'telp.required' => 'Nomor telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'menu_id.required' => 'Menu harus dipilih',
            'total_harga.required' => 'Total harga harus diisi',

        ]);

        $pesanan = Pesanan::create($request->only([
            'nama', 'telp', 'email', 'alamat', 'metode_pembayaran', 'catatan', 'total_harga'
        ]));

        $pesanan->menu()->attach($request->menu_id);

        return redirect()->route('formpesanan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

}