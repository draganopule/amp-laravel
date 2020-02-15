<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Hotel extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'description',
        'star',
        'street_address',
        'city',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(
            Country::class
        );
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
