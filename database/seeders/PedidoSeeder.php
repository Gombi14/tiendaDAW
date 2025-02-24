<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedido')->insert(
            [
                'id_comprador' => 1,
                'id_producte' => 1,
                'quantitat' => 1,
                'preu_total' => 10,
                'data_compra' => '2021-10-10'
            ],
            [
                'id_comprador' => 2,
                'id_producte' => 2,
                'quantitat' => 2,
                'preu_total' => 20,
                'data_compra' => '2021-10-10'
            ]
        );
    }
}
