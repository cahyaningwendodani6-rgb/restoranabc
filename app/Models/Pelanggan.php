<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'telp', 'alamat',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pesanan()
    {
        return $this->hasMany(\App\Models\Pesanan::class, 'pelanggan_id');
    }
}
