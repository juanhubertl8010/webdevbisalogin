<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';
    //protected $primaryKey = 'ID_keranjang';

    protected $fillable = [
        'ID_keranjang',
        'ID_user',
        'ID_catalog',
        'harga',
        'statusdel',
    ];
}
