<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class RoomType extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = [
        'name',
        'number_of_beds',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'number_of_guests',
        'price_per_night',
        'description',
        'hotel_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(
            Hotel::class
        );
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
