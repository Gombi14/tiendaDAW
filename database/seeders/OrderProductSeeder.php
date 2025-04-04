<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD
       $data = [
=======
        $data = [
>>>>>>> a43b8daf36d7c1909ac7e098625a98de404de7ee
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
<<<<<<< HEAD
                
=======
>>>>>>> a43b8daf36d7c1909ac7e098625a98de404de7ee
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
<<<<<<< HEAD
                
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
=======
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 3,
            ],
            [
                'order_id' => 2,
                'product_id' => 4,
                'quantity' => 1,
            ],
            [
                'order_id' => 1,
                'product_id' => 5,
                'quantity' => 2,
            ],
            [
                'order_id' => 1,
                'product_id' => 6,
                'quantity' => 1,
            ],
        ];        
>>>>>>> a43b8daf36d7c1909ac7e098625a98de404de7ee

        DB::table('order_product')->insert($data);
    }
}

