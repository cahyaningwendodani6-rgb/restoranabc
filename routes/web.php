<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\FormPesananController;
use App\Models\Pesanan;

=======
>>>>>>> 3a1772d4cc74727cabb8981fc353ad6518253548
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormPesananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController; 
use App\Models\Pesanan;

Route::get('/', [App\Http\Controllers\FormPesananController::class, 'index'])->name('formpesanan.index');
Route::post('/', [App\Http\Controllers\FormPesananController::class, 'store'])->name('formpesanan.store');


Route::get('/pesanan/{id}/struk', [App\Http\Controllers\PesananController::class, 'struk'])->name('pesanan.struk');

Route::get('/pesanan/{id}/bayar', function ($id) {
    $pesanan = \App\Models\Pesanan::findOrFail($id);
    return "Pembayaran untuk Pesanan #{$id} - Total Rp " . number_format($pesanan->total_harga, 0, ',', '.');
});


Route::get('/pembayaran-terbaru', function () {
    $pesanan = Pesanan::latest()->first();

    if (!$pesanan) {
        return redirect()->route('pembayaran.index')->with('error', 'Belum ada pesanan.');
    }

    return redirect()->route('pembayaran.form', $pesanan->id);
})->name('pembayaran.terbaru');



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false
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

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'showForm'])->name('pembayaran.form');
    Route::post('/pembayaran/{id}', [PembayaranController::class, 'process'])->name('pembayaran.process');

});
