<?php

namespace Database\Factories;

use App\Models\Picture;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categorias = ['Coches', 'Motos', 'Motor y Accesorios', 'Moda y Accesorios', 'Inmoviliaria', 'Tv, Audio y Foto', 'Móviles y Telefonía', 'Informática y Electrónica', 'Deporte y Ocio', 'Bicicletas', 'Consolas Y Videojuegos', 'Hogar y Jardín', 'Electrodomésticos', 'Cine, Libros y Música', 'Niños y Bebés', 'Coleccionismo', 'Materiales de construcción', 'Industria y Agricultura', 'Empleo', 'Servicios', 'Otros'];

        return [
            'foto1'=>$this->faker->imageUrl($width=640, $height=600, $categorias[random_int(0, 20)]),
        ];
    }
}
