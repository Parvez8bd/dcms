<?php

namespace Database\Seeders;

use App\Models\Location\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_path = database_path('seeders/data/locations/districts.json');
        $districts = collect(json_decode(file_get_contents($json_path), true));

        // set max progress
        $this->command->getOutput()->progressStart($districts->count());

        // add timestamps
        $districts = $districts->map(function ($district){
            $district['created_at'] = now();
            $district['updated_at'] = now();
            // progress
            $this->command->getOutput()->progressAdvance();
            return $district;
        })->toArray();

        // insert into database
        District::insert($districts);

        // finish progress
        $this->command->getOutput()->progressFinish();
    }
}
