<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstaBook extends Model
{
    protected $fillable = ['title', 'author_id', 'genre_id', 'year', 'content'];
}
