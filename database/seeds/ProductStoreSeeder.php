<?php

use App\ProductStore;
use Illuminate\Database\Seeder;

class ProductStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 1000; $i++) {
            ProductStore::create([
                'name'=>$faker->text(10),
                'inserted_by'=>$faker->numberBetween(1,50),
                'store_id'=>$faker->numberBetween(1,100),
                'product_id'=>$faker->numberBetween(1,8),
                'condition_id'=>$faker->numberBetween(1,10),
                'unit_id'=>$faker->numberBetween(1,9),
                'images'=>$faker->randomElement([json_encode(['13_1589580681_store_cover.jpg']),json_encode(['1_1589572539.jpg','18_1589720247_store_cover.jpg']),json_encode(['18_1589720247_store_cover.jpg']),json_encode(['18_1589720247_store_cover.jpg']),json_encode(['14_1589610149_store_cover.jpg']),json_encode(['14_1589610149_store_cover.jpg'])]),
                'quantity_stock'=>$faker->numberBetween(1,50000)
            ]);
        }
    }
}
