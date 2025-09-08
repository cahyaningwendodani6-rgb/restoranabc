<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormPesananController;
use App\Http\Controllers\PesananController;

Route::get('/', [App\Http\Controllers\FormPesananController::class, 'index'])->name('formpesanan.index');
Route::post('/', [App\Http\Controllers\FormPesananController::class, 'store'])->name('formpesanan.store');


Route::get('/pesanan/{id}/struk', [App\Http\Controllers\PesananController::class, 'struk'])->name('pesanan.struk');

Route::get('/pesanan/{id}/bayar', function ($id) {
    $pesanan = \App\Models\Pesanan::findOrFail($id);
    return "Pembayaran untuk Pesanan #{$id} - Total Rp " . number_format($pesanan->total_harga, 0, ',', '.');
});



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'index'])->name('ubah-profil');
    Route::post('/ubah-profil', [App\Http\Controllers\OwnerController::class, 'update'])->name('ubah-profil.update');

    Route::resource('/menu', App\Http\Controllers\MenuController::class);

    Route::resource('/pesanan', App\Http\Controllers\PesananController::class)->only('index', 'show', 'destroy');

    Route::get('/owner/profile', [App\Http\Controllers\OwnerController::class, 'editProfile'])->name('owner.profile');
    Route::put('/owner/profile', [App\Http\Controllers\OwnerController::class, 'updateProfile'])->name('owner.update');
});
