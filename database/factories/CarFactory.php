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
        return [
            //
            'make'=> $this->faker->randomElement(Modelo::all())['make_id'],
            'model'=> $this->faker->randomElement(Modelo::all())['title'],
             'plate'=> '11-AA-11',
             'color'=> '#ffffff',
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
