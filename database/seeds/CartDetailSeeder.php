<?php

use App\CartDetail;
use App\ProductStore;
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
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            $product_store_id = $faker->numberBetween(1,50);
            CartDetail::create([
                'quantity'=>$faker->numberBetween(1,100),
                'cart_id'=>$faker->numberBetween(1,20),
                'product_store_id'=>$product_store_id,
                'unit_id'=>$faker->numberBetween(1,9),
                'price_id'=>ProductStore::where('id', $product_store_id)->first()->prices[0]->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
