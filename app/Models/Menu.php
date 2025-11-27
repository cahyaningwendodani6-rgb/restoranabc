<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'foto',
    ];

    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class, 'pesanan_menu')
            ->withPivot('jumlah')
            ->withTimestamps();

    }
}
