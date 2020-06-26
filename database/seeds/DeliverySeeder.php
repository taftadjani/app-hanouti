<?php

use App\Delivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
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
            Delivery::create([
                'delivery_mode_id'=>$faker->numberBetween(1,4),
                'user_id'=>$faker->numberBetween(1,10),
                'delivery_date'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
