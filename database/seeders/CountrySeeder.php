<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_path = database_path('seeders/data/countries.json');
        $countries = collect(json_decode(file_get_contents($json_path), true));

        // set max progress
        $this->command->getOutput()->progressStart($countries->count());

        // add timestamps
        $countries = $countries->map(function ($country){
            $country['created_at'] = now();
            $country['updated_at'] = now();
            // progress
            $this->command->getOutput()->progressAdvance();
            return $country;
        })->toArray();

        // insert into database
        Country::insert($countries);

        // finish progress
        $this->command->getOutput()->progressFinish();
    }
}
