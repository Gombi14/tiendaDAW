<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('products')->insert([
        [
          'name' => 'Sobre de cartas Rick y Morty',
          'description' => 'Sobre de cartas  coleccionables de la serie.',
          'price' => 3,
          'stock' => 100,
          'featured' => true,
          'category_id' => 1,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Modelo de resina de Rick',
          'description' => '¡Captura la esencia del científico loco Rick Sanchez con esta figura de acción de alta calidad! Esta figura detallada y realista presenta a Rick en su icónico atuendo de laboratorio, con su expresión sarcástica y su pistola de portales a su lado. Es el complemento perfecto para cualquier colección de fans de Rick y Morty.',
          'price' => 40,
          'stock' => 50,
          'featured' => true,
          'category_id' => 2,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_17gah517gah517ga.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Pistola Laser',
          'description' => ' ¡Siente la emoción de viajar a través del multiverso con esta réplica de la icónica Portal Gun de Rick y Morty! Esta pieza de colección detallada y funcional es perfecta para cualquier fan de la serie.',
          'price' => 50,
          'stock' => 10,
          'featured' => false,
          'category_id' => 2,
          'image' => '/storage/app/public/images/Screenshot from 2025-04-06 23-33-27.png',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Botella de Rick',
          'description' => '¡Mantente hidratado mientras viajas a través del multiverso con esta botella de agua interdimensional! Esta botella de acero inoxidable de alta calidad cuenta con un diseño exclusivo que muestra un portal abierto que te lleva a un mundo desconocido. Es el accesorio perfecto para cualquier fan de Rick y Morty.',
          'price' => 8,
          'stock' => 50,
          'featured' => true,
          'category_id' => 4,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_wpwr43wpwr43wpwr.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Figura de Accion de Rick',
          'description' => ' ¡Captura la esencia del científico loco Rick Sanchez con esta figura de acción de alta calidad! Esta figura detallada y realista presenta a Rick en su icónico atuendo de laboratorio, con su expresión sarcástica y su pistola de portales a su lado. Es el complemento perfecto para cualquier colección de fans de Rick y Morty.',
          'price' => 35,
          'stock' => 10,
          'featured' => false,
          'category_id' => 2,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_ca9149ca9149ca91.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Camiseta de la serie',
          'description' => '¡Viaja a través del multiverso con estilo con esta camiseta de portal interdimensional! Esta camiseta de alta calidad cuenta con un diseño exclusivo que muestra un portal abierto que te lleva a un mundo desconocido. Es el accesorio perfecto para cualquier fan de Rick y Morty.',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 5,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_ecwp81ecwp81ecwp.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Taza de portales',
          'description' => '¡Siente la emoción de viajar a través del multiverso con esta réplica de la icónica Portal Gun de Rick y Morty! Esta pieza de colección detallada y funcional es perfecta para cualquier fan de la serie.',
          'price' => 15,
          'stock' => 10,
          'featured' => false,
          'category_id' => 4,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_4mza5q4mza5q4mza.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Camiseta "Wubba Lubba Dub-Dub"',
          'description' => '¡Muestra tu amor por Rick y Morty con esta camiseta de alta calidad! Cuenta con un diseño exclusivo de Rick y su icónica frase "Wubba Lubba Dub-Dub". Perfecta para cualquier fan de la serie.',
          'price' => 25,
          'stock' => 50,
          'featured' => true,
          'category_id' => 5,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_si0xmnsi0xmnsi0x.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Poster',
          'description' => '¡Sumérgete en el caos interdimensional con este póster oficial de Rick y Morty! Con un diseño vibrante y lleno de personajes icónicos como Rick, Morty y algunos de sus extraños amigos del multiverso, este póster es perfecto para darle un toque de locura científica a cualquier habitación. Impreso en alta calidad para asegurar colores vivos y durabilidad. ¡Imprescindible para cualquier fan de la serie!',
          'price' => 10,
          'stock' => 10,
          'featured' => false,
          'category_id' => 1,
          'image' => '/storage/app/public/images/rick-and-morty-watch-i50046.jpg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Calcetines',
          'description' => 'Muestra tu amor por Rick y Morty con estos calcetines de alta calidad! Cuenta con un diseño exclusivo de Rick y su icónica frase "Wubba Lubba Dub-Dub". Perfecta para cualquier fan de la serie.',
          'price' => 5,
          'stock' => 50,
          'featured' => true,
          'category_id' => 5,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_3ve7qz3ve7qz3ve7.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ]
      ]);
    }
}
