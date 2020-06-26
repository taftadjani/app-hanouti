<?php

use App\Price;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
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
        Price::create([
                'inserted_by'=>$faker->numberBetween(1,10),
                'product_store_id'=>$i+1,
                'currency_id'=>$faker->numberBetween(1,4),
                'unit_id'=>$faker->numberBetween(1,9),
                'value'=>$faker->numberBetween(1,500),
                'quantity'=>$faker->numberBetween(1,10),
                'created_at'=>now(),
                'updated_at'=>now(),
                'enabled_at'=>now(),
            ]);
        }
    }
}
