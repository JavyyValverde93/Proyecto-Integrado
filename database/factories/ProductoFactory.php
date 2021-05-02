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
        $categorias = ['Coches', 'Motos', 'Motor y Accesorios', 'Moda y Accesorios', 'Inmoviliaria', 'Tv, Audio y Foto',
        'Móviles y Telefonía', 'Informática y Electrónica', 'Deporte y Ocio', 'Bicicletas', 'Consolas Y Videojuegos',
        'Hogar y Jardín', 'Electrodomésticos', 'Cine, Libros y Música', 'Niños y Bebés', 'Coleccionismo',
        'Materiales de construcción', 'Industria y Agricultura', 'Empleo', 'Servicios', 'Otros'];
        $nombres = ['Coche ', 'Moto ', 'Rueda ', 'Camisa ', 'Casa ', 'Tele ',
         'Móvil ', 'Pc ', 'Pelota ', 'Bici ', 'Consola ', 'Maceta ', 'Microondas  ', 'Pelicula ', 'Pañales ', 'Monedas ',
         'Apisonadora ', 'Tractor ', 'Busco empleado ', 'Fontanero ', 'Avion '];
        $color = ['rojo', 'azul', 'amarillo', 'naranja', 'verde', 'negro', 'blanco', 'gris', 'morado', 'rosa', 'marron'];
        $moviles = ["Apple", "Samsung", "Huawei", "Xiaomi", "OPPO", "Sony", "Realme", "LG", "Honor", "OnePlus", "Google", "TCL", "Alcatel", "Nokia", "Motorola", "CAT", "InnJoo", "Lenovo", "Microsoft", "Elephone", "HTC", "ZTE", "Vivo", "Asus", "Wiko", "Haier", "BlackBerry"];
        $coches = ["Abarth","Alfa Romeo","Aston Martin","Audi","Bentley", "BMW","Cadillac","Caterham","Chevrolet","Citroen", "Dacia","Ferrari","Fiat","Ford","Honda", "Infiniti","Isuzu","Iveco","Jaguar","Jeep", "Kia","KTM","Lada","Lamborghini","Lancia", "Land Rover","Lexus","Lotus","Maserati","Mazda", "Mercedes-Benz","Mini","Mitsubishi","Morgan","Nissan", "Opel","Peugeot","Piaggio","Porsche","Renault", "Rolls-Royce","Seat","Skoda","Smart","SsangYong", "Subaru","Suzuki","Tata","Tesla","Toyota", "Volkswagen","Volvo"];
        $motor = ['Rueda ', 'Motor 2.0 tdi ', 'Puerta ', 'Capó ', 'Techo solar ', 'Neón ', 'Escape ', 'Guantera ', 'Llanta ', 'Volante ', 'Funda volante ', 'Funda sillón ', 'Cabecero ', 'Cámara trasera '];
        $Moda = ['Camiseta ', 'Pantalón ', 'Falda ', 'Tacones ', 'Sudadera ', 'Chaqueta ', 'Zapatillas de deporte '];
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
