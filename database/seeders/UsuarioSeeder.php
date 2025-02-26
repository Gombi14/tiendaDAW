<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insertOrIgnore([
            [
                'name' => 'comprador1',
                'surname' => 'comprador1',
                'phone' => '123456789',
                'email' => 'comprador1@example.com',
                'address' => 'calle falsa 123',
                'role' => 'comprador'

            ],
            [
                'name' => 'admin',
                'surname' => 'admin',
                'phone' => '987654321',
                'email' => 'comprador2@example.com',
                'address' => 'calle falsa 321',
                'role' => 'administrador'
            ]
        ]);
    }   
}