<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categorias = ['Coches', 'Motos', 'Motor y Accesorios', 'Moda y Accesorios', 'Inmoviliaria', 'Tv, Audio y Foto', 'Móviles y Telefonía', 'Informática y Electrónica', 'Deporte y Ocio', 'Bicicletas', 'Consolas Y Videojuegos', 'Hogar y Jardín', 'Electrodomésticos', 'Cine, Libros y Música', 'Niños y Bebés', 'Coleccionismo', 'Materiales de construcción', 'Industria y Agricultura', 'Empleo', 'Servicios', 'Otros'];
        return [
            'nombre'=>$this->faker->name(),
            'categoria'=>$categorias[$this->faker->numberBetween(0, 20)],
            'descripcion'=>$this->faker->text($maxNbChars=60),
            'precio'=>$this->faker->numberBetween(10.0, 4000.99),
            'guardados'=>$this->faker->numberBetween(1, 40),
            'visualizaciones'=>$this->faker->numberBetween(1, 200),
            'user_id'=>$this->faker->numberBetween(5, 100),
        ];
    }
}
