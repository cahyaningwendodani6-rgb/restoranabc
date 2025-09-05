<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPesananController;

Route::get('/', [App\Http\Controllers\FormPesananController::class, 'index'])->name('formpesanan.index');
Route::post('/', [App\Http\Controllers\FormPesananController::class, 'store'])->name('formpesanan.store');




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
});
