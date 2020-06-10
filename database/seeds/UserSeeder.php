<?php

use App\City;
use App\Country;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker_ko = Faker\Factory::create('ko_KR');
        for ($i=0; $i < 50; $i++) {
            $live = $faker->numberBetween(1,129);
            $nationality = $faker->numberBetween(1,2);
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'nick_name' => $faker->firstName,
                'email' => $faker->unique()->freeEmail(),
                'live_at'=>$live,
                'indicatif'=>Country::where('id',$nationality)->first()->phone_indicatif,
                'phone'=>$faker_ko->cellPhoneNumber,
                'gender' => $faker->randomElement(['man','woman']),
                'nationality'=>$nationality,
                'password' => Hash::make('aaaaaaaa'),
            ]);
        }
    }
}
