<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
                'name'=>"Dirham Marocain",
                'symbol'=>".د.م",
                'code'=>"MAD",
                'number'=>504,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Franc CFA (CEMAC)",
                'symbol'=>"fcfa",
                'code'=>"XAF",
                'number'=>950,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Euro",
                'symbol'=>"€",
                'code'=>"EUR",
                'number'=>978,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Dollar US",
                'symbol'=>"$",
                'code'=>"USD",
                'number'=>840,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
