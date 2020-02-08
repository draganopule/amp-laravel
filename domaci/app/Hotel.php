<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = [
        'name',
        'description',
        'star',
        'street_address',
        'city',
        'country',
    ];

    public function country()
    {
        return $this->belongsTo(
            Country::class
        );
    }

    public function room_types()
    {
        return $this->belongsToMany(
            RoomType::class,
            'hotel_room_type',
            'hotel_id',
            'room_type_id'
        );
    }
}
