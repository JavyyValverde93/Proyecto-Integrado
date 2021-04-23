<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);

        \App\Models\User::factory(101)->create();
        // \App\Models\Picture::factory(201)->create();
        \App\Models\Producto::factory(201)->create();
        \App\Models\Pregunta::factory(201)->create();
        \App\Models\Comentario::factory(201)->create();
        // \App\Models\Respuesta::factory(401)->create();
    }
}
