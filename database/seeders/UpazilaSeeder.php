<?php

namespace Database\Seeders;

use App\Models\Location\Upazila;
use Illuminate\Database\Seeder;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json_path = database_path('seeders/data/locations/upazilas.json');
        $upazilas = collect(json_decode(file_get_contents($json_path), true));

        // set max progress
        $this->command->getOutput()->progressStart($upazilas->count());

        // add timestamps
        $upazilas = $upazilas->map(function ($upazila){
            $upazila['created_at'] = now();
            $upazila['updated_at'] = now();
            // progress
            $this->command->getOutput()->progressAdvance();
            return $upazila;
        })->toArray();


        // insert into database
        Upazila::insert($upazilas);

        // finish progress
        $this->command->getOutput()->progressFinish();
    }
}
