<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administrador')->insert(
            [  
                'nom' => 'admin',
                'Email' => 'admin@gmail.com',
                'contrasenya' => 'admin'

            ],
            [
                'nom' => 'admin2',
                'Email' => 'admin2@gmail.com',
                'contrasenya' => 'admin2'
            ]
        );
    }
}
