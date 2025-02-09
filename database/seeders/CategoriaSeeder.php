<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria')->insert(
            [
                'nom' => 'Accesorio'
            ],
            [
                'nom' => 'Prenda de Ropa'
            ],
            [
                'nom' => 'Mueble'
            ]
            );
    }
}
