<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table="rate";
    
    // protected $fillable = [
    //     "rate",
    // ];

    // public function instaBooks()
    // {
    //     return $this->hasMany(InstaBook::class, 'rate_id');
    // }
}
