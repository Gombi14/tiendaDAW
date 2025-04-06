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
                'name' => 'Coleccionable',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Figura',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mueble',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Uso Diario',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ropa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Juguete',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Libro',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pelicula',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Videojuego',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Zapato',
                'created_at' => now(),
                'updated_at' => now()
            ]
        
        ]);
    }
}
