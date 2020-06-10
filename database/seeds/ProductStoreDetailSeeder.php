<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStoreDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store_details')->insert([
            [
                'product_store_id'=>1,
                'name'=>"size",
                'content_value'=>"90",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
        DB::table('product_store_details')->insert([
            [
                'product_store_id'=>1,
                'name'=>"weight",
                'content_value'=>"90:1",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
        DB::table('product_store_details')->insert([
            [
                'product_store_id'=>2,
                'name'=>"width",
                'content_value'=>"90",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
