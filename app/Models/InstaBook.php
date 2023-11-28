<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaBook extends Model
{
    protected $fillable = ['title', 'author_id', 'genre_id', 'year', 'content'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

}
