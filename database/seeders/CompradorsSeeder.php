<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompradorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compradors')->insert([
            [
                'nom' => 'comprador1',
                'cognoms' => 'comprador1',
                'telefon' => '123456789',
                'email' => 'comprador1@example.com',
                'adreca' => 'calle falsa 123',

            ],
            [
                'nom' => 'comprador2',
                'cognoms' => 'comprador2',
                'telefon' => '987654321',
                'email' => 'comprador2@example.com',
                'adreca' => 'calle falsa 321',

            ]
        ]);
    }   
}