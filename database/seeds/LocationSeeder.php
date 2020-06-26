<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("ne_NP");
        for ($i=0; $i < 10; $i++) {
            Location::create([
                'city_id'=>$faker->numberBetween(1,129),
                'inserted_by'=>$faker->numberBetween(1,10),
                'locationable_id'=>$i,
                'locationable_type'=>"store",
                'lat'=>$faker->unique()->latitude(15,40),
                'lng'=>$faker->unique()->longitude(0,-15),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
            // $location = Location::where('id',$i+1)->first();
            // $location->lat = $faker->unique()->latitude(15,40);
            // $location->lng = $faker->unique()->longitude(0,-15);
            // $location->save();
        }
    }
}
