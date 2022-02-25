<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

    }
}
