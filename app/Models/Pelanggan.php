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
}
