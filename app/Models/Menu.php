<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'id',
        'nama',
        'kategori',
        'harga',
    ];

    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class, 'pesanan_menu', 'menu_id', 'pesanan_id')
                    ->withPivot('jumlah')->withTimestamps();
    }
}
