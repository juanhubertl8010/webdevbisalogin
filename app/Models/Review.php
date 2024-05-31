<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';
    protected $fillable = [
        'ID_review', 'ID_user', 'ID_catalog', 'review_date', 'rating', 'review_text',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_user', 'ID_user');
    }
}
