<?php

namespace Database\Seeders;
use File;
use App\Models\Make;
use App\Models\Modelo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            
        Modelo::query()->delete();
            $json = File::get(("database/data/makes.json"));
            $cars = json_decode($json);
      
            foreach ($cars as $car) {
            
                foreach($car->models as $model){
    
                    Modelo::create([
                      
                        "make_id" => $car->value,
                        "code" => $model->value,
                        "title" => $model->title
                    ]);
    
                }                            
            
            }

           
           
           
    }
}
