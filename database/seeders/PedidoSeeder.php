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
        DB::table('orders')->insert(
            [
                [
                    'user_id' => 1,
                    'total_price' => 50.00,
                    'status' => false,
                    'delivery_date' => null,  // pending
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => 2,
                    'total_price' => 30.00,
                    'status' => true, // delivered
                    'delivery_date' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
