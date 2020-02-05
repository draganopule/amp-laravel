<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Montenegro',
            'alpha2' => 'ME',
            'alpha3' => 'MNE',
        ]);
        Country::create([
            'name' => 'Serbia',
            'alpha2' => 'RS',
            'alpha3' => 'SRB',
        ]);
        Country::create([
            'name' => 'Italy',
            'alpha2' => 'IT',
            'alpha3' => 'ITA',
        ]);
        Country::create([
            'name' => 'France',
            'alpha2' => 'FR',
            'alpha3' => 'FRA',
        ]);
    }
}
