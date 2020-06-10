<?php

use App\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::create([
            'product_store_id'=>1,
            'order_id'=>1,
            'unit_id'=>1,
            'quantity'=>90,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        OrderDetail::create([
            'product_store_id'=>3,
            'order_id'=>1,
            'unit_id'=>1,
            'quantity'=>20,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        OrderDetail::create([
            'product_store_id'=>3,
            'order_id'=>2,
            'unit_id'=>1,
            'quantity'=>19,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
