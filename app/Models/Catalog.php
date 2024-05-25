<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalog';
    protected $primaryKey = 'ID_catalog';
    protected $fillable = [
        'ID_game',
        'ID_user',
        'product_name',
        'description',
        'harga',
        'imgproduct',
    ];

    public $timestamps = true;

    // Define the relationship to the User model
    public function seller()
    {
        return $this->belongsTo(User::class, 'ID_user', 'ID_user');
    }
}
