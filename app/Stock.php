<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //add file fillable
    protected $fillable = [
        'movie_id',
        'price_sale',
        'price_rental',
        'stock',
        'date_inserted_stock',
        'available',
        'date_modify',
        'user_id'
    ];
}
