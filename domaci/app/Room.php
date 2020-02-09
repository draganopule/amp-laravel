<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number',
        'hotel_id',
        'room_type_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(
            Hotel::class
        );
    }

    public function roomType()
    {
        return $this->belongsTo(
            RoomType::class
        );
    }
}
