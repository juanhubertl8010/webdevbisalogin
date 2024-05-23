<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
      // Menentukan nama tabel jika berbeda dengan nama default
      protected $table = 'games';

      // Menentukan primary key yang bukan 'id'
      protected $primaryKey = 'ID_game';
  
      // Menentukan tipe primary key jika bukan integer
      public $incrementing = false;
      protected $keyType = 'string';
  
      // Menentukan kolom-kolom yang dapat diisi
      protected $fillable = [
          'ID_game',
          'game_name',
          'description',
          'genre',
          'img'
      ];
}
