<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
       $data = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                
            ],
            [
                'order_id' => 2,
                'product_id' => 1,
                'quantity' => 1,
                
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'quantity' => 1,
            ],
        ];

        DB::table('order_product')->insert($data);
    }
}

