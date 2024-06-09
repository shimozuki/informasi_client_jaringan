<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'cllient';

    protected $fillable = [
        'nama',
        'alamat',
        'lat',
        'long',
        'jenis_jaringan',
        'kecepatan_jaringan',
        'no_tlpn',
    ];
}
