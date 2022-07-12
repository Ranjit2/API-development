<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
    }
}
