<?php

namespace Database\Factories;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comentario'=>$this->faker->text($maxNbChars=50),
            'user_id'=>$this->faker->numberBetween(4, 300),
            'producto_id'=>$this->faker->numberBetween(2, 600)
        ];
    }
}
