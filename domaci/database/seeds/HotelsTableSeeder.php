<?php

use Illuminate\Database\Seeder;
use App\Hotel;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'name' => 'Hilton',
            'description' => 'Pripada svetskom lancu hotela',
            'star' => 5,
            'street_address' => 'Ulica Slobode',
            'city' => 'Podgorica',
            'country' => 'Montenegro',
        ]);
        Hotel::create([
            'name' => 'Podgorica',
            'description' => 'Uklopljen u ambijent na obali Morace',
            'star' => 4,
            'street_address' => 'Svetlane Kane Radević',
            'city' => 'Podgorica',
            'country' => 'Montenegro',
        ]);
        Hotel::create([
            'name' => 'Adria',
            'description' => 'U Budvi, na obali mora',
            'star' => 4,
            'street_address' => 'Ulica 22. Novembra',
            'city' => 'Budva',
            'country' => 'Montenegro',
        ]);
    }
}
