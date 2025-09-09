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
<<<<<<< HEAD
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'telp' => 'required|string|max:15',
        'email' => 'nullable|email',
        'alamat' => 'required|string',
        'menu_id' => 'required|exists:menu,id',
        'catatan' => 'nullable|string',
    ]);

    // ambil harga dari menu yang dipilih
    $menu = \App\Models\Menu::findOrFail($request->menu_id);

    // simpan pesanan
    $pesanan = Pesanan::create([
        'nama' => $request->nama,
        'telp' => $request->telp,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'menu_id' => $menu->id,
        'metode_pembayaran' => $request->metode_pembayaran ?? null,
        'catatan' => $request->catatan,
        'total_harga' => $menu->harga, // total harga ikut harga menu
    ]);

    return redirect()->route('pembayaran.form', $pesanan->id)
                     ->with('success', 'Pesanan berhasil dibuat, silakan lanjutkan pembayaran.');
}

=======
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
>>>>>>> ea195d3bda81fce76a248a8558e85e8ce82b940a


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
