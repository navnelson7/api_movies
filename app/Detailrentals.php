<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailrentals extends Model
{
     //add file filleable
     protected $fillable = [
        'rental_id',
        'movie_id',
        'date_return',
        'returned',
    ];
}
