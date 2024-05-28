<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $fillable = [
        'ID_wishlist','ID_User', 'ID_catalog', 'harga', 'statusdel',
    ];

    public $timestamps = false;
}
