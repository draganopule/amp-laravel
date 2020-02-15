<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'email' => "dragan@test.com",
            "name" => "Dragan",
            "password" => bcrypt("123456"),
            "email_verified_at" => now(),
        ]);
        $this->call(CountriesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
    }
}
