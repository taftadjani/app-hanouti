<?php

use App\Follow;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
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
            Follow::create([
                'followed_by'=>$faker->numberBetween(1,10),
                'followable_id'=>$faker->numberBetween(1,10),
                'followable_type'=>'store',
            ]);
        }
    }
}
