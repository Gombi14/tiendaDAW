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
          'name' => 'Llavero',
          'description' => 'Camiseta de algodon',
          'price' => 10,
          'stock' => 100,
          'featured' => true,
          'category_id' => 1,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Pantalon',
          'description' => 'Pantalon de algodon',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 2,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Mesa',
          'description' => 'Mesa de madera',
          'price' => 50,
          'stock' => 10,
          'featured' => false,
          'category_id' => 3,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Lavadora',
          'description' => 'Pantalon de algodon',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 4,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Nintendo',
          'description' => 'Mesa de madera',
          'price' => 50,
          'stock' => 10,
          'featured' => false,
          'category_id' => 5,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Pistola de juguete',
          'description' => 'Pantalon de algodon',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 6,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'El Quijote',
          'description' => 'Mesa de madera',
          'price' => 50,
          'stock' => 10,
          'featured' => false,
          'category_id' => 7,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Vengadores',
          'description' => 'Pantalon de algodon',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 8,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Call of Duty',
          'description' => 'Mesa de madera',
          'price' => 50,
          'stock' => 10,
          'featured' => false,
          'category_id' => 9,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ],
        [
          'name' => 'Nike Air Max',
          'description' => 'Pantalon de algodon',
          'price' => 20,
          'stock' => 50,
          'featured' => true,
          'category_id' => 10,
          'image' => '/storage/app/public/images/Gemini_Generated_Image_arbsgaarbsgaarbs.jpeg',
          'created_at' => now(),
          'updated_at' => now()
        ]
      ]);
    }
}
