<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        City::create([
            'name' => 'vic',
            'country_id' => Country::where('name', 'australia')->value('id')
        ]);
        City::create([
            'name' => 'nsw',
            'country_id' => Country::where('name', 'australia')->value('id')
        ]);
        City::create([
            'name' => 'act',
            'country_id' => Country::where('name', 'australia')->value('id')
        ]);
        City::create([
            'name' => 'newcastle',
            'country_id' => Country::where('name', 'uk')->value('id')
        ]);
        City::create([
            'name' => 'new york',
            'country_id' => Country::where('name', 'usa')->value('id')
        ]);
        City::create([
            'name' => 'kathmandu',
            'country_id' => Country::where('name', 'nepal')->value('id')
        ]);

    }
}
