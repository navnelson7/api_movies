<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //add file filleable
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'stock',
        'price_sale',
        'price_rental',
        'available',
        'user_id',
    ];
}
