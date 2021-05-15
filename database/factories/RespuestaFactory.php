<?php

namespace Database\Factories;

use App\Models\Respuesta;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\Factory;

class RespuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Respuesta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $comentario = rand(1, 1300);
        $user = rand(1, 503);
        
        $prod = Comentario::where('id', $comentario)->get()->first()->producto_id;
        
        
        return [
            'respuesta'=>$this->faker->text($maxNbChars = 200),
            'user_id'=>$user,
            'producto_id'=>$prod,
            'comentario_id'=>$comentario
        ];
    }
}
