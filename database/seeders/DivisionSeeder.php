<?php

namespace Database\Seeders;

use App\Models\Location\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $json_path = database_path('seeders/data/locations/divisions.json');
        $divisions = collect(json_decode(file_get_contents($json_path), true));

        // set max progress
        $this->command->getOutput()->progressStart($divisions->count());

        // add timestamps
        $divisions = $divisions->map(function ($division){
            $division['created_at'] = now();
            $division['updated_at'] = now();
            // progress
            $this->command->getOutput()->progressAdvance();
            return $division;
        })->toArray();

        // insert into database
        Division::insert($divisions);

        // finish progress
        $this->command->getOutput()->progressFinish();
    }
}
