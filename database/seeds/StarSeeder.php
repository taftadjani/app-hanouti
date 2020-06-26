<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarSeeder extends Seeder
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
            for ($j=0; $j < $faker->numberBetween(1,5); $j++) {
                $faker_unique = Faker\Factory::create();
                DB::table('stars')->insert([
                    [
                        'inserted_by'=>$faker_unique->unique()->numberBetween(1,10),
                        'starable_id'=>$i,
                        'starable_type'=>'product_store',
                        'value'=>$faker_unique->numberBetween(1,5),
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ]
                ]);
            }

        }
    }
}
