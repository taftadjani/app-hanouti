<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStoreModeleSeeder extends Seeder
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
            DB::table('product_store_modele')->insert([
                'modele_id'=>$faker->numberBetween(1,7),
                'product_store_id'=>$i+1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
