<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'pelanggan_id', 'nama', 'telp', 'email', 'alamat', 'metode_pembayaran', 'total_harga', 'catatan',
    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'pesanan_menu')
            ->withPivot('jumlah')
            ->withTimestamps();
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pesanan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(\App\Models\Pelanggan::class, 'pelanggan_id');
    }
}
