<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            [
                'product_id'=>1,
                'category_id'=>5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>1,
                'category_id'=>6,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>2,
                'category_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>1,
                'category_id'=>11,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
