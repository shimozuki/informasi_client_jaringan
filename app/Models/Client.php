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
        'ktp',
        'alamat',
        'no_tlpn',
        'sn_out',
        'odp',
        'kecepatan_jaringan',
        'teknisi',
        'ket',
        'interface',
        'lat',
        'long',
        'panjang_kabel',
        'status'
    ];
    
}
