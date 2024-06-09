<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaringan extends Model
{
    use HasFactory;
    protected $table = 'jaringan';

    protected $fillable = [
        'code_jaringan',
        'jns_jaringan',
        'harga',
    ];

    protected $casts = [
        'harga' => 'string',
    ];
}
