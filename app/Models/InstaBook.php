<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaBook extends Model
{
    protected $fillable = ['title', 'author_id', 'genre_id', 'year', 'content','user_id', "image_path"];

    public function getAuthor()
    {
        return Author::select('firstname')->where('id','=',$this->author_id)->get();
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function getGenre()
    {
        return Genre::select()->where('id','=',$this->genre_id)->get();
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

        public function averageRating()
    {
        return $this->ratings()->avg('rate');
    }

    public function ratings()
    {
        return $this->hasMany(Rate::class, 'insta_book_id');
    }

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
