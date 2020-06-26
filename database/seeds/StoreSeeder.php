<?php

use App\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
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
            Store::create([
                'name'=>$faker->company,
                'created_by'=> $faker->numberBetween(1,10),
                'currency_id'=> $faker->numberBetween(1,4),
                'storeable_type'=>$faker->randomElement(['user','company']),
                'storeable_id'=>$faker->numberBetween(1,10),
            ]);
        }
    }
}
