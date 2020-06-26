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
        $faker = Faker\Factory::create();
        for ($i=0; $i < 50; $i++) {
            DB::table('product_store_sub_category')->insert([
                    'product_store_id'=>$i+1,
                    'sub_category_id'=>$faker->numberBetween(1,87),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
        }
    }
}
