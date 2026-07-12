<?php

namespace Database\Seeders;

use App\Models\Location\Union;
use Illuminate\Database\Seeder;

class UnionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_path = database_path('seeders/data/locations/unions.json');
        $unions = collect(json_decode(file_get_contents($json_path), true));

        // set max progress
        $this->command->getOutput()->progressStart($unions->count());

        // add timestamps
        $unions = $unions->map(function ($union){
            $union['created_at'] = now();
            $union['updated_at'] = now();
            // progress
            $this->command->getOutput()->progressAdvance();
            return $union;
        })->toArray();


        // insert into database
        Union::insert($unions);
        
        // finish progress
        $this->command->getOutput()->progressFinish();
    }
}
