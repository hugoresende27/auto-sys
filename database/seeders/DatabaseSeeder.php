<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ManuSeeder;
use Database\Seeders\ModelosSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin',
            'role' => 3,
            'password' => bcrypt('admin'),
            'created_at'=> now()
        ]);
        \DB::table('users')->insert([
            'name' => 'Teste',
            'email' => 't@t',
            
            'password' => bcrypt('admin'),
            'created_at'=> now()
        ]);

        // $this->call(MakeSeeder::class);
       
        $this->call(ManuSeeder::class);
        $this->call(ModelosSeeder::class);
        // \App\Models\Car::factory(100)->create();

    }
}
