<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesanan;
use App\Models\Menu;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $pesanan = Pesanan::with('menu')->orderBy('id', 'desc')->get();
        return view('pages.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telp' => 'required',
            'menu_id' => 'required|array',
            'metode_pembayaran' => 'required',
        ]);

        // Simpan pesanan
        $pesanan = Pesanan::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'metode_pembayaran' => $request->metode_pembayaran,
            'catatan' => $request->catatan,
            'total_harga' => $request->total_harga,
        ]);

        // Simpan relasi pesanan-menu
        foreach ($request->menu_id as $menuId) {
        $pesanan->menu()->attach($menuId, ['jumlah' => 1]); // ✔ pakai "menu"
    }


        // Redirect ke halaman struk
        return redirect()->route('pesanan.struk', $pesanan->id);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanan = Pesanan::with('menu')->findOrFail($id);
        return view('pages.pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }

    public function struk($id)
    {
        // Ambil pesanan beserta menu
        $pesanan = Pesanan::with('menu')->findOrFail($id);

        // Generate QRIS string dinamis berdasarkan ID & total harga
        $qrisString = "PESANAN|ID:{$pesanan->id}|TOTAL:{$pesanan->total_harga}";

        // Kirim ke view
        return view('pages.pesanan.struk', compact('pesanan', 'qrisString'));
    }


}
