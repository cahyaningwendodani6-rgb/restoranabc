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
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'telp' => 'required|max:20',
            'email' => 'nullable|email',
            'alamat' => 'required|string',
            'menu_id' => 'required',
            'metode_pembayaran' => 'required',
            'total_harga' => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa teks',
            'telp.required' => 'Nomor telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.string' => 'Alamat harus berupa teks',
            'menu_id.required' => 'Menu harus dipilih',
            'metode_pembayaran.required' => 'Metode pembayaran harus dipilih',
            'total_harga.required' => 'Total harga belum muncul sebelum kamu memilih menu',
        ]);

        // Simpan pesanan
        $pesanan = Pesanan::create([
            'nama' => $validated['nama'],
            'telp' => $validated['telp'],
            'email' => $validated['email'] ?? null,
            'alamat' => $validated['alamat'],
            'metode_pembayaran' => $validated['metode_pembayaran'],
            'total_harga' => $validated['total_harga'],
            'catatan' => $request->catatan,
        ]);

        // Simpan detail menu (pakai attach langsung)
        $pesanan->menu()->attach($validated['menu_id']);

        // Setelah simpan → langsung redirect ke struk
        return redirect()->route('pesanan.struk', $pesanan->id);
    }

    public function struk($id)
    {
        $pesanan = Pesanan::with(['menu', 'pembayaran'])->findOrFail($id);

        // QRIS string simulasi (optional)
        $qrisString = "PESANAN|ID:{$pesanan->id}|TOTAL:{$pesanan->total_harga}";

        return view('pages.pesanan.struk', compact('pesanan', 'qrisString'));
    }

}
