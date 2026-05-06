<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    protected $fillable = [
        'alamat',
        'luas_kamar',
        'jenis_kamar',
        'is_full',
        'harga',
    ];
}
