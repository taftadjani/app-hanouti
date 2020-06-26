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
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            DB::table('product_store_details')->insert([
                'name'=> DB::table('product_detail_names')->select('name')->where('id', $faker->numberBetween(1,70))->pluck('name')->first(),
                'content_value'=>implode(" ",$faker->words(5)),
                'product_store_id'=>$faker->numberBetween(1,50),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
