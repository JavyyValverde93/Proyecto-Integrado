<?php

namespace Database\Factories;

use App\Models\Respuesta;
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
        return [
            // 'respuesta'=>$this->faker->text($maxNbChars=50),
            // 'comentario_id'=>$this->faker->numberBetween(5, 200),

        ];
    }
}
