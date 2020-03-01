<?php

use Illuminate\Database\Seeder;
use App\Reservation;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'chek_in_date' => '2020-03-24',
            'chek_out_date' => '2020-03-30',
            'hotel_id' => 1,
            'user_id' => 1,
        ]);
        Reservation::create([
            'chek_in_date' => '2020-03-14',
            'chek_out_date' => '2020-03-16',
            'hotel_id' => 2,
            'user_id' => 1,
        ]);
        Reservation::create([
            'chek_in_date' => '2020-03-17',
            'chek_out_date' => '2020-03-20',
            'hotel_id' => 3,
            'user_id' => 1,
        ]);
    }
}
