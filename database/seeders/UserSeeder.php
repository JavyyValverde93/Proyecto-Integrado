<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@correo.com',
            'password'=>Hash::make('admin'),
            'ciudad'=>'Almeria',
            'tipo'=>1,
            'email_verified_at'=>now()
        ]);
        User::create([
            'name'=>'administrador',
            'email'=>'administrador@correo.com',
            'password'=>Hash::make('derecho12'),
            'ciudad'=>'Andorra',
            'tipo'=>1,
            'email_verified_at'=>now()
        ]);
        User::create([
            'name'=>'UsuarioEstandar',
            'email' => 'estandar@correo.com',
            'password' => Hash::make('derecho12'),
            'ciudad' => 'Cataluña',
            'email_verified_at' => now()
        ]);
    }
}
