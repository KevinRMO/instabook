<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{   
    public $timestamps = false;
    
    use HasFactory;
    protected $fillable = [
        'lastname',
        'firstname',
    ];

    public function instaBooks()
    {
        return $this->hasMany(InstaBook::class, 'author_id');
    }
}
