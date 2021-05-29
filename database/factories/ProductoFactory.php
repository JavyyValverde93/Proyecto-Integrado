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
        $nombre = ["", ""];
        $nombre2 = ["", ""];
        $nombre3 = ["", ""];

        $precio1 = 1;
        $precio2 = 40000;

        $categorias = ['Coches', 'Motos', 'Motor y Accesorios', 'Moda y Accesorios', 'Inmobiliaria', 'Tv, Audio y Foto',
        'Móviles y Telefonía', 'Informática y Electrónica', 'Deporte y Ocio', 'Bicicletas', 'Consolas Y Videojuegos',
        'Hogar y Jardín', 'Electrodomésticos', 'Cine, Libros y Música', 'Niños y Bebés', 'Coleccionismo',
        'Materiales de construcción', 'Industria y Agricultura', 'Empleo', 'Servicios', 'Otros'];
        
        $nombres = ['Coche ', 'Moto ', 'Rueda ', 'Camisa ', 'Casa ', 'Tele ',
         'Móvil ', 'Pc ', 'Pelota ', 'Bici ', 'Consola ', 'Maceta ', 'Microondas  ', 'Pelicula ', 'Pañales ', 'Monedas ',
         'Apisonadora ', 'Tractor ', 'Busco empleado ', 'Fontanero ', 'Avion '];
        $color = ['rojo', 'azul', 'amarillo', 'naranja', 'verde', 'negro', 'blanco', 'gris', 'morado', 'rosa', 'marron'];
        $moviles = ["Apple ", "Samsung ", "Huawei ", "Xiaomi ", "OPPO ", "Sony ", "Realme ", "LG ", "Honor ", "OnePlus ", "Google ", "TCL ", "Alcatel ", "Nokia ", "Motorola ", "CAT ", "Lenovo ", "Microsoft ", "Elephone ", "HTC ", "ZTE ", "Vivo ", "Asus ", "Wiko ", "Haier ", "BlackBerry"];
        $coches = ["Abarth ", "Alfa Romeo ", "Aston Martin ", "Audi ", "Bentley", "BMW ", "Cadillac ", "Caterham ", "Chevrolet ", "Citroen", "Dacia ", "Ferrari ", "Fiat ", "Ford ", "Honda", "Infiniti ", "Isuzu ", "Iveco ", "Jaguar ", "Jeep ", "Kia ", "KTM ", "Lada ", "Lamborghini ", "Lancia ", "Land Rover ", "Lexus ", "Lotus ", "Maserati ", "Mazda ", "Mercedes-Benz ", "Mini ", "Mitsubishi ", "Morgan ", "Nissan ", "Opel ", "Peugeot ", "Piaggio ", "Porsche ", "Renault ", "Rolls-Royce ", "Seat ", "Skoda ", "Smart ", "SsangYong ", "Subaru ", "Suzuki ", "Tata ", "Tesla ", "Toyota ", "Volkswagen ", "Volvo "];
        $motor = ['Rueda ', 'Motor 2.0 tdi ', 'Puerta ', 'Capó ', 'Techo solar ', 'Neón ', 'Escape ', 'Guantera ', 'Llanta ', 'Volante ', 'Funda volante ', 'Funda sillón ', 'Cabecero ', 'Cámara trasera '];
        $moda = ['Camiseta ', 'Pantalón ', 'Falda ', 'Tacones ', 'Sudadera ', 'Chaqueta ', 'Zapatillas de deporte '];
        $inmobiliaria = ['Casa ', 'Piso ', 'Apartamento ', 'Hotel ', 'Local ', 'Tienda ', 'Garaje ', 'Trastero ', 'Parcela ', 'Terreno '];
        $ciudades = ['Almería ', 'Rioja ', 'Córdoba ', 'Sevilla ', 'Jaén ', 'Murcia ', 'Torrevieja ', 'Misisipi ', 'El Cairo ', 'Madagascar ', 'Londres ', 'París ', 'Retamar ', 'Alquian ', 'Linares ', 'Roquetas ', 'San Isidro ', 'Campohermoso ', 'Badajoz ', 'Soria ', 'Galicia ', 'Pontevedra ', 'País Vasco ', 'Cádiz ', 'Toledo ', 'Tenerife ', 'Linares ', 'La Sierra ', 'Málaga ', 'Granada ', 'Huelva ', 'Florida ', 'San Sebastian ', 'Victoria ', 'Valencia ', 'Cataluña ', 'Valladolid ', 'Cuenca ', 'Madrid ', 'Móstoles ', 'Rioja ', 'Dinamarca ', 'Turquía ', 'Asturias ', 'Olimpo ', 'Fiñana ', 'Zaragoza ', 'Santander '];
        $tv = ['Televisión ', 'Monitor ', 'Altavoces ', 'Altavoz ', 'Auriculares ', 'Cascos ', 'Pantalla ', 'Micrófono ', 'Mando tv ', 'Mando bluetooth altavoz ', 'Marco electrónico ', 'Portafotos electrónico ', 'Proyector '];
        $pc = ['Ordenador ', 'Torre ', 'Pc ', 'Pc gaming ', 'Portatil ', 'Tablet ', 'Ipad ', 'Libro electrónico '];
        $deporte = ['Pelota ', 'Balón ', 'Bola ', 'Arco ', 'Palo ', 'Stick ', 'Red ', 'Peto ', 'Camiseta ', 'Pantalón ', 'Zapatillas '];
        $consola = ['Ps1 ', 'Ps2 ', 'Ps3 ', 'Ps4 ', 'Ps5 ', 'Xbox ', 'Xbox 360 ', 'Xbox One ', 'Xbox Scorpio ', 'Xbox series X', 'PSP ', 'PsVita ', 'Nintendo ', 'Ds ', 'Dsi ', 'Dsi XL ', '3Ds ', '3Ds XL ', '2Ds ', '2Ds XL '];
        $juego = ['Crash ', 'God of war ', 'Call of duty ', 'Cars ', 'WW2 ', 'Sonic ', 'Mario ', 'Ratchet and Clank ', 'Resident Evil ', 'Horizon zero down ', 'Forza ', 'Medievil ', 'Little big planet ', 'Zombies ', 'Plantas ', 'Remember me ', 'Buscaminas '];
        $hogar = ['Maceta ', 'Macetero ', 'Planta ', 'Ladrillo ', 'Banco ', 'Taburete ', 'Silla ', 'Sofá ', 'Cama ', 'Litera ', 'Mesa ', 'Escritorio ', 'Armario ', 'Encimera ', 'Grifo ', 'Váter ', 'Puerta ', 'Candado ', 'Zapatero ', 'Losa '];
        $electrodomesticos = ['Lavadora ', 'Secadora ', 'Plancha ', 'Batidora ', 'Frigorífico ', 'Frigo ', 'Lavadero ', 'Tostadora ', 'Horno ', 'Microondas ', 'Aire acondicionado ', 'Congelador '];
        $cine = ['Película ', 'BluRay ', 'HD ', 'Disco ', 'DVD ', 'CD ', 'Canción ', 'Música ', 'Viaje al centro de la Tierra ', 'Julio Verne ', 'Adolfo ', 'Jack '];
        $bebes = ['Pañal ', 'Biberón ', 'Ropa ', 'Manta ', 'Mantita ', 'Mantón ', 'Chupete ', 'Tirita ', 'Patuco '];
        $coleccionismo = ['Monedas antigüas ', 'Jarrón antigüo ', 'Cuadro antigüo ', 'Figuras coleccionista ', 'Mandos coleccionista ', 'Teléfonos coleccionista ', 'Bombillas coleccionista ', 'Juegos antigüos '];
        $construcción = ['Grúa ', 'Cuerda ', 'Camión ', 'Remolque ', 'Cemento ', 'Máquina cemento ', 'Escaleras ', 'Bidones ', 'Pintura ', 'Brocha grande ', 'Pared ', 'Ladrillos ', 'Madera ', 'Pala ', 'Pico '];
        $agricultura = ['Tractor ', 'Torillo ', 'Escarabajo ', 'Pala ', 'Planta ', 'Semilla ', 'Cartel ', 'Tubo ', 'Manguera ', 'Riego ', 'Gomas ', 'Plástico ', 'Coco '];
        $empleo = ['Taxista ', 'Conductor de autobús ', 'Obrero ', 'Chofer ', 'Paseador de perros ', 'Fontanero ', 'Peluquero ', 'Pintor ', 'Agricultor ', 'Mecánico ', 'Técnico ', 'Informático ', 'Programador ', 'Rapero ', 'Roquero ', 'Músico ', 'Traductor ', 'Minero '];

        $n = $this->faker->numberBetween(0, 20);
        $num = $n;
        if($num==0 || $num==1 || $num==2){
            $nombre = $coches;
            $nombre2 = $color;
            $nombre3 = ['año '.rand(1998, 2020)];
            if($num==2){
                $nombre2 = $coches;
                $nombre3 = $color;
                $nombre = $motor;
            }
            $precio1 = 40000;
            $precio2 = 400000;
        }else if($num==3){
            $nombre = $moda;
            $nombre2 = $color;
            $precio1 = 1000;
            $precio2 = 10000;
        }else if($num==4){
            $nombre = $inmobiliaria;
            $nombre2 = $color;
            $nombre3 = $ciudades;
            $precio1 = 100000;
            $precio2 = 8000000;
        }else if($num==5){
            $nombre = $tv;
            $nombre2 = $color;
            $nombre3 = $moviles;
            $precio1 = 12000;
            $precio2 = 100000;
        }else if($num==6){
            $nombre = $moviles;
            $nombre2 = $color;
            $precio1 = 12000;
            $precio2 = 130000;
        }else if($num==7){
            $nombre = $pc;
            $nombre2 = $color;
            $nombre3 = $moviles;
            $precio1 = 42000;
            $precio2 = 130000;
        }else if($num==8){
            $nombre = $deporte;
            $nombre2 = $color;
        }else if($num==9){
            $nombre = ['Bicicleta '];
            $nombre2 = $color;
            $nombre3 = $moviles;
            $precio1 = 40000;
            $precio2 = 200000;
        }else if($num==10){
            if(rand(0, 10)%2==1){
                $nombre = $consola;
                $nombre2 = $color;
                $precio1 = 10000;
                $precio2 = 60000;
            }else{
                $nombre = ['Juego '];
                $nombre2 = $juego;
                $nombre3 = $consola;
                $precio1 = 500;
                $precio2 = 6000;
            }
        }else if($num==11){
            $nombre = $hogar;
            $nombre2 = $color;
            $precio1 = 5000;
            $precio2 = 70000;
        }else if($num==12){
            $nombre = $electrodomesticos;
            $nombre2 = $color;
            $nombre3 = $moviles;
            $precio1 = 12000;
            $precio2 = 70000;
        }else if($num==13){
            $nombre = $cine;
            $nombre2 = $juego;
            $precio1 = 400;
            $precio2 = 3000;
        }else if($num==14){
            $nombre = $bebes;
            $nombre2 = $color;
            $nombre2 = $juego;
            $precio1 = 1000;
            $precio2 = 5000;
        }else if($num==15){
            $nombre = $coleccionismo;
            $nombre2 = $color;
            $precio1 = 10000;
            $precio2 = 300000;
        }else if($num==16){
            $nombre = $construcción;
            $nombre2 = $color;
            $precio1 = 10000;
            $precio2 = 50000;
        }else if($num==17){
            $nombre = $agricultura;
            $nombre2 = $color;
            $precio1 = 5000;
            $precio2 = 30000;
        }else if($num==18){
            $nombre = ['Busco ', 'Buscamos '];
            $nombre2 = $empleo;
            $nombre3 = $ciudades;
            $precio1 = 100000;
            $precio2 = 250000;
        }else if($num==19){
            $nombre2 = $empleo;
            $nombre3 = $ciudades;
            $precio1 = 100000;
            $precio2 = 250000;
        }else if($num==20){
            $nombre = $nombres;
        }

        return [
            'nombre'=>$nombre[rand(0, count($nombre)-1)]."".$nombre2[rand(0, count($nombre2)-1)]." ".$nombre3[rand(0, count($nombre3)-1)],
            'categoria'=>$categorias[$num],
            'descripcion'=>$this->faker->text($maxNbChars=60),
            'precio'=>mt_rand($precio1, $precio2)/100,
            'guardados'=>$this->faker->numberBetween(1, 90),
            'visualizaciones'=>$this->faker->numberBetween(1, 200),
            'user_id'=>$this->faker->numberBetween(5, 100),
        ];
    }
}
