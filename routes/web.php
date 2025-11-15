<?php

use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PelangganLoginController;
use App\Http\Controllers\Auth\PelangganRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormPesananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Route;

// --- Halaman publik (tanpa login) ---

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/login-pelanggan', [PelangganLoginController::class, 'showLoginForm'])->name('pelanggan.login');
Route::post('/login-pelanggan', [PelangganLoginController::class, 'login'])->name('pelanggan.login.post');
Route::post('/logout-pelanggan', [PelangganLoginController::class, 'logout'])->name('pelanggan.logout');

Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/pesanan-anda', [PesananController::class, 'riwayat'])->name('pesanan.riwayat');
    Route::get('/pesanan/{id}', [PesananController::class, 'detail'])->name('pesanan.detail');
});

Route::get('/register-pelanggan', [PelangganRegisterController::class, 'showRegistrationForm'])->name('pelanggan.register');
Route::post('/register-pelanggan', [PelangganRegisterController::class, 'register'])->name('pelanggan.register.post');

Route::get('/menunya', function () {
    return view('menunya');
})->name('menunya');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/pemesanan', [FormPesananController::class, 'index'])->name('pemesanan');
Route::post('/pemesanan', [FormPesananController::class, 'store'])->name('formpesanan.store');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/pesan', [HomeController::class, 'create'])->name('pesanan.create');
Route::post('/pesan', [FormPesananController::class, 'store'])->name('formpesanan.store');

Route::post('/pesan', [PesananController::class, 'store'])->name('pesanan.store');
// Pembayaran
Route::get('/pembayaran/{id}', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
Route::post('/pembayaran/{id}', [PembayaranController::class, 'store'])->name('pembayaran.store');
Route::post('/pembayaran/{id}/upload-bukti', [PembayaranController::class, 'uploadBukti'])->name('pembayaran.upload');
Route::get('/pembayaran/{id}/verifikasi', [PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');

Route::put('/pembayaran/update-status/{id}', [PembayaranController::class, 'updateStatus'])->name('pembayaran.updateStatus');

// Pembayaran terbaru
Route::post('/pesanan', [FormPesananController::class, 'store'])->name('formpesanan.store');
Route::get('/pembayaran-terbaru', function () {
    $pesanan = Pesanan::latest()->first();
    if (! $pesanan) {
        return redirect()->route('formpesanan.index')->with('error', 'Belum ada pesanan.');
    }

    return redirect()->route('pembayaran.form', $pesanan->id);
})->name('pembayaran.terbaru');

// Struk & status pesanan
Route::get('/pesanan/{id}/struk', [PesananController::class, 'struk'])->name('pesanan.struk');
Route::post('/pesanan/{id}/update-status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
Route::get('/pesanan/{id}/cetak', [PesananController::class, 'cetak'])->name('pesanan.cetak');

// --- Login / Logout Admin ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --- Admin (butuh login / auth) ---
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Ubah profil owner
    Route::get('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'index'])->name('ubah-profil');
    Route::put('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'update'])->name('ubah-profil.update');

    // Menu (CRUD)
    Route::resource('/menu', App\Http\Controllers\MenuController::class);

    // Pesanan admin
    Route::resource('/pesanan', App\Http\Controllers\PesananController::class)->only('index', 'show', 'destroy');
    Route::get('/admin/pesanan', [PesananController::class, 'indexAdmin'])->name('admin.pesanan.index');
    Route::post('/admin/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.updateStatus');
    Route::get('/admin/pesanan/{id}/cetak', [PesananController::class, 'cetakAdmin'])->name('admin.pesanan.cetak');

    // Form Pembayaran (Admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/form-pembayaran', [App\Http\Controllers\FormPembayaranController::class, 'index'])->name('form-pembayaran.index');
        Route::post('/form-pembayaran/{id}/verifikasi', [App\Http\Controllers\FormPembayaranController::class, 'verifikasi'])->name('form-pembayaran.verifikasi');
        Route::post('/form-pembayaran/{id}/tolak', [PembayaranController::class, 'tolak'])->name('form-pembayaran.tolak');
        Route::post('/form-pembayaran/{id}/detail', [App\Http\Controllers\FormPembayaranController::class, 'show'])->name('form-pembayaran.show');

        Route::get('/halaman/{slug}', [PageController::class, 'edit'])->name('halaman.edit');
        Route::put('/halaman/{slug}', [PageController::class, 'update'])->name('halaman.update');

    });

    Route::prefix('admin/pelanggan')->name('admin.pelanggan.')->group(function () {
        Route::get('/{id}/detail', [App\Http\Controllers\Admin\PelangganController::class, 'detail'])->name('detail');
        Route::delete('/{id}', [App\Http\Controllers\Admin\PelangganController::class, 'destroy'])->name('destroy');
        Route::get('/admin/pelanggan/{id}/detail', [PelangganController::class, 'detail'])
            ->name('admin.pelanggan.detail');

    });

    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan.index');

    Route::get('/admin/pelanggan/pesanan/{id}', [App\Http\Controllers\Admin\PelangganController::class, 'detailPesanan'])->name('admin.pelanggan.pesanan.detail');

    // Laporan
    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{tanggal}', [App\Http\Controllers\LaporanController::class, 'detail'])->name('laporan.detail');

    Route::get('/notif-counts', function () {
        return response()->json([
            'pesanan' => \App\Models\Pesanan::where('status', 'pending')->count(),
            'pembayaran' => \App\Models\Pembayaran::whereIn('status', ['pending', 'Menunggu Verifikasi'])->count(),
        ]);
    })->name('notif.counts');

});
