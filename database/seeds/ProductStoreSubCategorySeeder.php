<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStoreSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store_sub_category')->insert([
            [
                'product_store_id'=>1,
                'sub_category_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_store_id'=>1,
                'sub_category_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_store_id'=>1,
                'sub_category_id'=>4,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
