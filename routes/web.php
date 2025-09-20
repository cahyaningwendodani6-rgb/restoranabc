<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/form-pesanan', [App\Http\Controllers\FormPesananController::class, 'index'])->name('formpesanan.index');

Route::post('/store', [App\Http\Controllers\FormPesananController::class, 'store'])->name('formpesanan.store');

Route::get('/pembayaran/{id}', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
Route::post('/pembayaran/{id}', [PembayaranController::class, 'store'])->name('pembayaran.store');

Route::get('/pembayaran/{id}/verifikasi', [App\Http\Controllers\PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');

Route::get('/pesanan/{id}/struk', [App\Http\Controllers\PesananController::class, 'struk'])->name('pesanan.struk');

Route::get('/pesanan/{id}/bayar', function ($id) {
    $pesanan = \App\Models\Pesanan::findOrFail($id);

    return "Pembayaran untuk Pesanan #{$id} - Total Rp ".number_format($pesanan->total_harga, 0, ',', '.');
});

Route::post('/pembayaran/{id}/upload-bukti', [PembayaranController::class, 'uploadBukti'])->name('pembayaran.store');

Route::get('/pembayaran-terbaru', function () {
    $pesanan = Pesanan::latest()->first();

    if (! $pesanan) {
        return redirect()->route('pembayaran.index')->with('error', 'Belum ada pesanan.');
    }

    return redirect()->route('pembayaran.form', $pesanan->id);
})->name('pembayaran.terbaru');

Route::get('/pesanan/{id}/status', [App\Http\Controllers\PesananController::class, 'showStatus'])->name('pesanan.status');
Route::post('/pesanan/{id}/status', [App\Http\Controllers\PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', function () {
        return redirect()->route('dashboard'); // arahkan ke dashboard
    })->name('home');

    Route::get('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'update'])->name('ubah-profil.update');

    Route::resource('/menu', App\Http\Controllers\MenuController::class);

    Route::resource('/pesanan', App\Http\Controllers\PesananController::class)->only('index', 'show', 'destroy');

    Route::get('/owner/profile', [App\Http\Controllers\OwnerController::class, 'editProfile'])->name('owner.profile');
    Route::put('/owner/profile', [App\Http\Controllers\OwnerController::class, 'updateProfile'])->name('owner.update');

    Route::get('/form-pembayaran', [App\Http\Controllers\FormPembayaranController::class, 'index'])->name('form-pembayaran.index');
    Route::get('/form-pembayaran/{id}/verifikasi', [App\Http\Controllers\FormPembayaranController::class, 'verifikasi'])->name('form-pembayaran.verifikasi');
    Route::get('/form-pembayaran/{id}/batal', [App\Http\Controllers\FormPembayaranController::class, 'batal'])->name('form-pembayaran.batal');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/form-pembayaran', [App\Http\Controllers\FormPembayaranController::class, 'index'])->name('form-pembayaran.index');
        Route::post('/form-pembayaran/{id}/verifikasi', [App\Http\Controllers\FormPembayaranController::class, 'verifikasi'])->name('form-pembayaran.verifikasi');
        Route::post('/form-pembayaran/{id}/tolak', [App\Http\Controllers\PembayaranController::class, 'tolak'])->name('form-pembayaran.tolak');
        Route::post('/form-pembayarn/{id}/detail', [App\Http\Controllers\FormPembayaranController::class, 'show'])->name('form-pembayaran.show');
    });

    Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{tanggal}', [App\Http\Controllers\LaporanController::class, 'detail'])->name('laporan.detail');

    Route::get('/admin/pesanan', [PesananController::class, 'indexAdmin'])->name('admin.pesanan.index');
    Route::post('/admin/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.updateStatus');

});
