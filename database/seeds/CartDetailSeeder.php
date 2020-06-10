<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_details')->insert([
            [
                'quantity'=>10,
                'cart_id'=>1,
                'product_store_id'=>1,
                'unit_id'=>3,
                'price_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'quantity'=>55,
                'cart_id'=>3,
                'product_store_id'=>2,
                'unit_id'=>1,
                'price_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'quantity'=>46,
                'cart_id'=>2,
                'product_store_id'=>2,
                'unit_id'=>2,
                'price_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'quantity'=>90,
                'cart_id'=>2,
                'product_store_id'=>3,
                'unit_id'=>2,
                'price_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'quantity'=>89,
                'cart_id'=>4,
                'product_store_id'=>1,
                'unit_id'=>4,
                'price_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
