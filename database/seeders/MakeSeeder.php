<?php

namespace Database\Seeders;

use File;
use App\Models\Make;
use App\Models\Modelo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Make::query()->delete();
      
  
        $json = File::get(("database/data/makes.json"));
        $makes = json_decode($json);
  
        foreach ($makes as $key => $value) {
            Make::create([
              
                "code" => $value->value,
                "title" => $value->title
            ]);
          
           
           
        
        }

        
     

       
  
        
    }
}
