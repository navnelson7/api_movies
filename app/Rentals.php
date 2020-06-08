<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    protected $fillable = [
        'user_id',
        'date_rental',
    ];
}
