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

        \App\Models\User::factory(500)->create();
        \App\Models\Producto::factory(600)->create();
        \App\Models\Pregunta::factory(1601)->create();
        \App\Models\Comentario::factory(1514)->create();
        \App\Models\Follower::factory(5000)->create();
        \App\Models\Respuesta::factory(3401)->create();
    }
}
