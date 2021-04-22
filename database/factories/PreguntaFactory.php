<?php

namespace Database\Factories;

use App\Models\Pregunta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PreguntaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pregunta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pregunta'=>$this->faker->text($maxNbChars=50),
            'respuesta'=>$this->faker->text($maxNbChars=50),
            'user_id'=>$this->faker->numberBetween(5, 99),
            'producto_id'=>$this->faker->numberBetween(2, 200)
        ];
    }
}
