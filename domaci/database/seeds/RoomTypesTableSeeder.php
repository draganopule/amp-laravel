<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'name' => 'jednokrevetna',
            'number_of_beds' => 1,
            'number_of_bedrooms' => 1 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 1,
            'price_per_night' => 30,
            'description' => 'Skromna jednokrevetna soba sa jednim kupatilom',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'jednokrevetna',
            'number_of_beds' => 1,
            'number_of_bedrooms' => 1 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 1,
            'price_per_night' => 30,
            'description' => 'Skromna jednokrevetna soba sa jednim kupatilom',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'dvokrevetna',
            'number_of_beds' => 2,
            'number_of_bedrooms' => 1 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 2,
            'price_per_night' => 40,
            'description' => 'Dvokrevetna soba sa jednim kupatilom',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'dvokrevetna',
            'number_of_beds' => 2,
            'number_of_bedrooms' => 1 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 2,
            'price_per_night' => 40,
            'description' => 'Dvokrevetna soba sa jednim kupatilom',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'trokrevetna',
            'number_of_beds' => 3,
            'number_of_bedrooms' => 1,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 3,
            'price_per_night' => 50,
            'description' => 'Trokrevetna soba sa jednim kupatilom',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'apartman',
            'number_of_beds' => 4,
            'number_of_bedrooms' => 2 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 4,
            'price_per_night' => 60,
            'description' => 'Apartman za cetiri osobe sa dvije sobe i jednim kupatilom',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'luksuzni apartman',
            'number_of_beds' => 6,
            'number_of_bedrooms' => 3 ,
            'number_of_bathrooms' => 2,
            'number_of_guests' => 6,
            'price_per_night' => 100,
            'description' => 'Luksuzni apartman za sest osoba sa tri sobe i dva kupatila',
            'hotel_id' => 1,
        ]);
        RoomType::create([
            'name' => 'jednokrevetna',
            'number_of_beds' => 1,
            'number_of_bedrooms' => 1 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 1,
            'price_per_night' => 30,
            'description' => 'Skromna jednokrevetna soba sa jednim kupatilom',
            'hotel_id' => 2,
        ]);
        RoomType::create([
            'name' => 'jednokrevetna',
            'number_of_beds' => 1,
            'number_of_bedrooms' => 1,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 1,
            'price_per_night' => 30,
            'description' => 'Skromna jednokrevetna soba sa jednim kupatilom',
            'hotel_id' => 2,
        ]);
        RoomType::create([
            'name' => 'dvokrevetna',
            'number_of_beds' => 2,
            'number_of_bedrooms' => 1 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 2,
            'price_per_night' => 40,
            'description' => 'Dvokrevetna soba sa jednim kupatilom',
            'hotel_id' => 2,
        ]);
        RoomType::create([
            'name' => 'trokrevetna',
            'number_of_beds' => 3,
            'number_of_bedrooms' => 1,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 3,
            'price_per_night' => 50,
            'description' => 'Trokrevetna soba sa jednim kupatilom',
            'hotel_id' => 2,
        ]);
        RoomType::create([
            'name' => 'trokrevetna',
            'number_of_beds' => 3,
            'number_of_bedrooms' => 1,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 3,
            'price_per_night' => 50,
            'description' => 'Trokrevetna soba sa jednim kupatilom',
            'hotel_id' => 2,
        ]);
        RoomType::create([
            'name' => 'apartman',
            'number_of_beds' => 4,
            'number_of_bedrooms' => 2 ,
            'number_of_bathrooms' => 1,
            'number_of_guests' => 4,
            'price_per_night' => 60,
            'description' => 'Apartman za cetiri osobe sa dvije sobe i jednim kupatilom',
            'hotel_id' => 2,
        ]);
        RoomType::create([
            'name' => 'luksuzni apartman',
            'number_of_beds' => 6,
            'number_of_bedrooms' => 3 ,
            'number_of_bathrooms' => 2,
            'number_of_guests' => 6,
            'price_per_night' => 100,
            'description' => 'Luksuzni apartman za sest osoba sa tri sobe i dva kupatila',
            'hotel_id' => 2,
        ]);
    }
}
