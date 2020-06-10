<?php

use App\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name'=>"CHAD",
                'numeric_code'=>148,
                'phone_indicatif'=>'+235',
                'currency_id'=>Currency::where('number', 950)->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"MOROCCO",
                'numeric_code'=>504,
                'phone_indicatif'=>'+212',
                'currency_id'=>Currency::where('number', 504)->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
