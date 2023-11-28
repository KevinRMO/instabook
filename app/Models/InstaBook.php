<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaBook extends Model
{
    protected $fillable = ['title', 'author_id', 'genre_id', 'year', 'content'];

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

    public function getRate()
    {
        return Rate::select()->where('id','=',$this->rate_id)->get();
    }

}
