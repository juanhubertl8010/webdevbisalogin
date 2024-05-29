<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'ID_transaksi',
        'ID_catalog',
        'transaksi_date',
        'ID_user',
        'harga',
        'deskripsi',
        'statusbyr',
        'statusdel',
    ];

    public $timestamps = false; // Nonaktifkan timestamps
}
