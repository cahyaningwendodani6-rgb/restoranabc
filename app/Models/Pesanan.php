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
        'pesanan',
        'metode_pembayaran',
        'catatan',
        'total_harga'
    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }
}
