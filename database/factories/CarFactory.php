<?php

namespace Database\Factories;

use App\Models\Make;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        //  $x = rand (1,5062);
        // $make_model = Modelo::all()->random()->first();
        // $modelo = $make_model->title;
        // $manu = $make_model->make_id;

        return [
            //
            
            
            'user_id'=>2,
            'make'=> $this->faker->randomElement($x= Modelo::all())['make_id'],
            // 'model'=> $this->faker->randomElement(Modelo::all())['title'],
                     
             'plate'=> rand(0,99).strtoupper($this->faker-> lexify('??')).rand(0,99),
             'color'=> $this->faker->hexcolor(),
            'kms'=>rand(10000,25999),
            'year'=>rand(1980,2020),
            'value'=>rand(1000,49999),
            'last_revision'=>rand(10000,20000),
            'next_revision'=>rand(10500,20999),
            
            'driver'=>$this->faker->firstName(),
            'details'=>$this->faker->sentence($nbWords = 3),
        ];
    }
}
