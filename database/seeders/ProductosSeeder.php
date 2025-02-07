<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('productos')->insert([
        [
          'nom' => 'Camiseta',
          'descripcio' => 'Camiseta de algodon',
          'preu' => 10,
          'stock' => 100,
          'destacat' => true,
          'categoria_id' => 2
        ],
        [
          'nom' => 'Pantalon',
          'descripcio' => 'Pantalon de algodon',
          'preu' => 20,
          'stock' => 50,
          'destacat' => true,
          'categoria_id' => 2
        ],
        [
          'nom' => 'Mesa',
          'descripcio' => 'Mesa de madera',
          'preu' => 50,
          'stock' => 10,
          'destacat' => false,
          'categoria_id' => 3
        ]
      ]);
    }
}
