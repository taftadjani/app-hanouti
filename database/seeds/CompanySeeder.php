<?php

use App\Company;
use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
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
            $nationality = $faker->numberBetween(1,2);
            Company::create([
                'inserted_by'=>$faker->numberBetween(1,50),
                'name'=>$faker->company,
                'description'=>$faker->text,
                'mail'=>$faker->unique()->freeEmail(),
                'indicatif'=>Country::where('id',$nationality)->first()->phone_indicatif,
                'phone'=>$faker_ko->cellPhoneNumber,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
