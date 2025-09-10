<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananMenu extends Model
{
     use HasFactory;

    protected $table = 'pesanan_menu'; // nama tabel pivot

    protected $fillable = [
        'pesanan_id',
        'menu_id',
        'jumlah',
    ];

    // Relasi ke Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi ke Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
