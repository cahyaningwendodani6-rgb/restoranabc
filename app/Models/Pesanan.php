<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    use HasFactory;
    
    protected $table = 'pesanan';

    protected $fillable = [
        'nama',
        'telp',
        'email',
        'alamat',
        'metode_pembayaran',
        'catatan',
        'total_harga'
    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'pesanan_menu', 'pesanan_id', 'menu_id')
                    ->withPivot('jumlah')->withTimestamps();
    }

    public function pembayaran()
    {
         return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }

}
