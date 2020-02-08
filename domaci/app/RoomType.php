<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'name',
        'number_of_beds',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'number_of_guests',
        'price_per_night',
        'description',
    ];
}
