<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
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
            DB::table('role_user')->insert([
                'user_id' => $i+1,
                'role_id' => $faker->numberBetween(1,3),
            ]);
        }
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3,
        ]);
    }
}
