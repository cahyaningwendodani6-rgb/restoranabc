<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormPesananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\FormPembayaranController;
use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

// --- Halaman publik (tanpa login) ---

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/menunya', function () {
    return view('menunya');
})->name('menunya');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/reservation', [FormPesananController::class, 'index'])->name('reservation');
Route::post('/reservation', [FormPesananController::class, 'store'])->name('formpesanan.store');


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
Route::get('/pesanan/{id}/status', [PesananController::class, 'showStatus'])->name('pesanan.status');
Route::post('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');

// --- Login / Logout Admin ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --- Admin (butuh login / auth) ---
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Ubah profil owner
    Route::get('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'update'])->name('ubah-profil.update');

    // Menu (CRUD)
    Route::resource('/menu', App\Http\Controllers\MenuController::class);

    // Pesanan admin
    Route::resource('/pesanan', App\Http\Controllers\PesananController::class)->only('index', 'show', 'destroy');
    Route::get('/admin/pesanan', [PesananController::class, 'indexAdmin'])->name('admin.pesanan.index');
    Route::post('/admin/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.updateStatus');

    // Form Pembayaran (Admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/form-pembayaran', [App\Http\Controllers\FormPembayaranController::class, 'index'])->name('form-pembayaran.index');
        Route::post('/form-pembayaran/{id}/verifikasi', [App\Http\Controllers\FormPembayaranController::class, 'verifikasi'])->name('form-pembayaran.verifikasi');
        Route::post('/form-pembayaran/{id}/tolak', [PembayaranController::class, 'tolak'])->name('form-pembayaran.tolak');
        Route::post('/form-pembayaran/{id}/detail', [App\Http\Controllers\FormPembayaranController::class, 'show'])->name('form-pembayaran.show');
    });

    // Laporan
    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{tanggal}', [App\Http\Controllers\LaporanController::class, 'detail'])->name('laporan.detail');
});
