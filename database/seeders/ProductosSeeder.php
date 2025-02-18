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
          'name' => 'Camiseta',
          'description' => 'Camiseta de algodon',
          'price' => 10,
          'stock' => 100,
          'featured' => true,
          'category_id' => 9,
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Pantalon',
          'description' => 'Pantalon de algodon',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 8,
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Mesa',
          'description' => 'Mesa de madera',
          'price' => 50,
          'stock' => 10,
          'featured' => false,
          'category_id' => 10,
          'created_at' => now(),
          'updated_at' => now()
        ]
      ]);
    }
}
