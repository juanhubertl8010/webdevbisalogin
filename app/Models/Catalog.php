<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog'; // sesuaikan dengan nama tabel Anda

    protected $primaryKey = 'ID_catalog'; // sesuaikan dengan primary key tabel Anda

    protected $fillable = [
        'ID_game',
        'ID_user',
        'product_name',
        'description',
        'harga',
        'imgproduct',
    ];

    // Jika Anda tidak menggunakan kolom timestamps (created_at dan updated_at), Anda bisa menonaktifkannya
    public $timestamps = true; // atau false tergantung dari tabel Anda
}
