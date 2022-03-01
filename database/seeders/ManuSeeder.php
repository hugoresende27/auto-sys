<?php

namespace Database\Seeders;

use App\Models\Manu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use File;

class ManuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Manu::query()->delete();
      
  
        $json = File::get(("database/data/makes_v2.json"));
        $makes = json_decode($json);
  
        foreach ($makes as $key => $value) 
        {
            Manu::firstOrCreate([
              
                "make" => $value->make,
            
            ]);
        }
    }
}
