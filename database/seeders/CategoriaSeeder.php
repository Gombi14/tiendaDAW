<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Accesorio',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Prenda de Ropa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mueble',
                'created_at' => now(),
                'updated_at' => now()
            ]
        
        ]);
    }
}
