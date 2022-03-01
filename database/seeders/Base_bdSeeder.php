<?php

namespace Database\Seeders;
use File;
use App\Models\Base_db;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Base_bdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
               
        Base_db::query()->delete();
      
  
        $json = File::get(("database/data/makes_v2.json"));
        $makes = json_decode($json);
  
        foreach ($makes as $key => $value) {
            Base_db::create([
              
                "year" => $value->year,
                "make" => $value->make,
                "model" => $value->model
            ]);
          
           
           
        
        }
    }
}
