<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;
    
    use HasFactory;
    protected $fillable = [
        'genre'
    ];

    public function instaBooks()
    {
        return $this->hasMany(InstaBook::class, 'genre_id');
    }
}
