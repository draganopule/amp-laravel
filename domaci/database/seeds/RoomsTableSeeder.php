<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'number' => 1,
            'hotel_id' => 1,
            'room_type_id' => 1,
        ]);
        Room::create([
            'number' => 2,
            'hotel_id' => 1,
            'room_type_id' => 1,
        ]);
        Room::create([
            'number' => 3,
            'hotel_id' => 1,
            'room_type_id' => 2,
        ]);
        Room::create([
            'number' => 4,
            'hotel_id' => 1,
            'room_type_id' => 2,
        ]);
        Room::create([
            'number' => 5,
            'hotel_id' => 1,
            'room_type_id' => 5,
        ]);
        Room::create([
            'number' => 1,
            'hotel_id' => 2,
            'room_type_id' => 6,
        ]);
        Room::create([
            'number' => 2,
            'hotel_id' => 2,
            'room_type_id' => 6,
        ]);
        Room::create([
            'number' => 3,
            'hotel_id' => 2,
            'room_type_id' => 7,
        ]);
        Room::create([
            'number' => 4,
            'hotel_id' => 2,
            'room_type_id' => 9,
        ]);
        Room::create([
            'number' => 1,
            'hotel_id' => 3,
            'room_type_id' => 11,
        ]);
        Room::create([
            'number' => 2,
            'hotel_id' => 3,
            'room_type_id' => 11,
        ]);
        Room::create([
            'number' => 3,
            'hotel_id' => 3,
            'room_type_id' => 11,
        ]);
        Room::create([
            'number' => 4,
            'hotel_id' => 3,
            'room_type_id' => 13,
        ]);
    }
}
