<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //protected $dateFormat = 'Y-m-d';

    protected $table = 'reservations';

    protected $fillable = [
        'chek_in_date',
        'chek_out_date',
        'hotel_id',
        'user_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(
            Hotel::class
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    public function rooms()
    {
        return $this->belongsToMany(
            Room::class,
            'reservation_room',
            'reservation_id',
            'room_id'
        );
    }
}
