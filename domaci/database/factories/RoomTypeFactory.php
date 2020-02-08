<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RoomType;
use Faker\Generator as Faker;

$factory->define(RoomType::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['jednokrevetna', 'dvokrevetna', 'apartman', 'luksuzni apartman']),
        'number_of_beds' => $faker->numberBetween($min = 1, $max = 8) ,
        'number_of_bedrooms' => $faker->numberBetween($min = 1, $max = 4) ,
        'number_of_bathrooms' => $faker->numberBetween($min = 1, $max = 3) ,
        'number_of_guests' => $faker->numberBetween($min = 1, $max = 8) ,
        'price_per_night' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000),
        'description' => $faker->paragraphs(2,true),
    ];
});
