<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua pesanan + relasi menu
        $query = \App\Models\Pesanan::with('menu');

        // Filter berdasarkan tanggal (jika dipilih)
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter berdasarkan status (jika dipilih)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Urutkan dari terbaru ke lama
        $pesanan = $query->orderBy('created_at', 'desc')->get();

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
            'pelanggan_id' => auth()->id(),
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
            'status' => 'pending',
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
            'status' => 'required|in:pending,diproses,diantar,selesai,batal',
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

    public function cetak($id)
    {
        $pesanan = Pesanan::with(['menu', 'pembayaran'])->findOrFail($id);

        return view('pages.pesanan.struk', compact('pesanan'));
    }

    public function cetakAdmin($id)
    {
        $pesanan = Pesanan::with('menu')->findOrFail($id);

        return view('pages.owner.struk', compact('pesanan'));
    }

    public function riwayat(Request $request)
    {
        $status = $request->query('status'); // ambil filter status dari query

        $query = Pesanan::with('menu')
            ->where('pelanggan_id', auth()->id()) // ⬅ Hanya pesanan milik user login
            ->orderBy('created_at', 'desc');

        if ($status && in_array($status, ['pending', 'diproses', 'diantar', 'selesai', 'batal'])) {
            $query->where('status', $status);
        }

        $pesanan = $query->get();

        return view('pelanggan.pesanan.index', compact('pesanan', 'status'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::with(['menu', 'pembayaran'])->findOrFail($id);

        return view('pelanggan.pesanan.detail', compact('pesanan'));
    }

    public function batalkan(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
        ]);

        $pesanan = Pesanan::where('id', $id)
            ->where('pelanggan_id', auth()->id())
            ->firstOrFail();

        if ($pesanan->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        $pesanan->status = 'batal';
        $pesanan->catatan = 'Alasan pembatalan: '.$request->alasan;
        $pesanan->save();

        // === tambah session untuk notifikasi refund ===
        $refund = number_format($pesanan->total_harga, 0, ',', '.');
        $message = "Pengembalian uang senilai Rp $refund berhasil dikembalikan.";

        return redirect()->back()->with('refund_success', $message);
    }
}
