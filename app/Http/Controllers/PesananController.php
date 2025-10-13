<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Menu;
use App\Models\Pembayaran; 

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'email' => 'nullable|email',
            'alamat' => 'required|string',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menu,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'metode_pembayaran' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // hitung total harga
        $total = 0;
        foreach ($request->menu_id as $key => $menuId) {
            $menu = Menu::findOrFail($menuId);
            $jumlah = $request->jumlah[$key];
            $total += $menu->harga * $jumlah;
        }

        // simpan pesanan
        $pesanan = Pesanan::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'metode_pembayaran' => strtolower($request->metode_pembayaran),
            'catatan' => $request->catatan,
            'total_harga' => $total,
        ]);

        // simpan relasi pesanan-menu
        foreach ($request->menu_id as $key => $menuId) {
            $jumlah = $request->jumlah[$key];
            $pesanan->menu()->attach($menuId, ['jumlah' => $jumlah]);
        }

        // buat pembayaran default (pending)
        $pesanan->pembayaran()->create([
            'metode' => $request->metode_pembayaran,
            'status' => 'pending'
        ]);

        // redirect ke struk
        return redirect()->route('pesanan.struk', $pesanan->id)
                        ->with('success', 'Pesanan berhasil dibuat.');
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }

    /**
     * Struk pesanan + QRIS
     */
    public function struk($id)
    {
        // Ambil pesanan beserta menu
        $pesanan = Pesanan::with('menu', 'pembayaran')->findOrFail($id);

        // Generate QRIS string dinamis berdasarkan ID & total harga
        $qrisString = "PESANAN|ID:{$pesanan->id}|TOTAL:{$pesanan->total_harga}";

        // Kirim ke view
        return view('pages.pesanan.struk', compact('pesanan', 'qrisString'));
        return redirect()->route('pesanan.struk', $pesanan->id)
                        ->with('success', 'Pesanan berhasil dibuat.');
    }


    // Admin update status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,diantar,selesai,batal'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function indexAdmin()
    {
        $pesanan = \App\Models\Pesanan::with('menu')->latest()->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

}
