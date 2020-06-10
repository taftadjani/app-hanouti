<?php

use App\Cart;
use App\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
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
        Cart::create(
            [
                'user_id'=>$i+1,
                'currency_id'=>Currency::where('number',$faker->randomElement([504,950,978,840]))->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
        for ($i=0; $i < 300; $i++) {
            Cart::create(
                [
                    'user_id'=>$faker->numberBetween(1,50),
                    'currency_id'=>Currency::where('number',$faker->randomElement([504,950,978,840]))->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);
            }
    }
}
