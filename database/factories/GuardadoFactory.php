<?php

namespace Database\Factories;

use App\Models\Guardado;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuardadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guardado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $user = rand(1, 300);
        // $producto = rand(1, 600);
        // $bucle = 0;
        // $distinto = Guardado::where('user_id', $user)->where('producto_id', $producto)->find(1);
        // while($bucle==0){
        //     if($distinto==null){
        //         return [
        //             'user_id'=>$this->faker->numberBetween(1, 300),
        //             'producto_id'=>$this->faker->numberBetween(2, 600)
        //         ];
        //     }else{
        //         $user = rand(1, 300);
        //         $producto = rand(1, 600);
        //         $distinto = Guardado::where('user_id', $user)->where('producto_id', $producto)->find(1);
        //     }
        // }
    }
}
