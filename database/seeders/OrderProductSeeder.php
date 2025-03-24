<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
        $orderIds = [1, 2];
        $productIds = range(1, 11);

        $data = [];
        foreach ($orderIds as $orderId) {
            foreach ($productIds as $productId) {
                $data[] = [
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => rand(1, 10), // Cantidad aleatoria entre 1 y 10
                ];
            }
        }

        DB::table('order_product')->insert($data);
    }
}

