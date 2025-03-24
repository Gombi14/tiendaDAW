<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
                'password' => Hash::make('comprador1'),
                'phone' => '123456789',
                'email' => 'comprador1@example.com',
                'address' => 'calle falsa 123',
                'role' => 'comprador'
            ],
            [
                'name' => 'admin',
                'surname' => 'admin',
                'password' => Hash::make('admin'),
                'phone' => '987654321',
                'email' => 'comprador2@example.com',
                'address' => 'calle falsa 321',
                'role' => 'administrador'
            ],
            [
                'name' => 'comprador3',
                'surname' => 'comprador3',
                'password' => Hash::make('comprador3'),
                'phone' => '111222333',
                'email' => 'comprador3@example.com',
                'address' => 'avenida siempre viva 742',
                'role' => 'comprador'
            ],
            [
                'name' => 'comprador4',
                'surname' => 'comprador4',
                'password' => Hash::make('comprador4'),
                'phone' => '444555666',
                'email' => 'comprador4@example.com',
                'address' => 'plaza central 56',
                'role' => 'comprador'
            ],
            [
                'name' => 'comprador5',
                'surname' => 'comprador5',
                'password' => Hash::make('comprador5'),
                'phone' => '777888999',
                'email' => 'comprador5@example.com',
                'address' => 'calle principal 101',
                'role' => 'comprador'
            ],
            [
                'name' => 'admin2',
                'surname' => 'admin2',
                'password' => Hash::make('admin2'),
                'phone' => '159753456',
                'email' => 'admin2@example.com',
                'address' => 'bulevar central 303',
                'role' => 'administrador'
            ],
            [
                'name' => 'comprador6',
                'surname' => 'comprador6',
                'password' => Hash::make('comprador6'),
                'phone' => '852369741',
                'email' => 'comprador6@example.com',
                'address' => 'ruta 66, km 20',
                'role' => 'comprador'
            ],
            [
                'name' => 'comprador7',
                'surname' => 'comprador7',
                'password' => Hash::make('comprador7'),
                'phone' => '951753852',
                'email' => 'comprador7@example.com',
                'address' => 'avenida del sol 99',
                'role' => 'comprador'
            ],
            [
                'name' => 'admin3',
                'surname' => 'admin3',
                'password' => Hash::make('admin3'),
                'phone' => '321654987',
                'email' => 'admin3@example.com',
                'address' => 'parque empresarial 12',
                'role' => 'administrador'
            ],
            [
                'name' => 'comprador8',
                'surname' => 'comprador8',
                'password' => Hash::make('comprador8'),
                'phone' => '753159852',
                'email' => 'comprador8@example.com',
                'address' => 'zona industrial 7',
                'role' => 'comprador'
            ]
        ]);
    }   
}