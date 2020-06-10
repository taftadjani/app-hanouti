<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'name'=>"Mètre",
                'abbrev'=>"m",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Litre",
                'abbrev'=>"l",
                'for_liquid'=>true,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Kilogramme",
                'abbrev'=>"kg",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Seconde",
                'abbrev'=>"s",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Ampère",
                'abbrev'=>"A",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Kelvin",
                'abbrev'=>"K",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Mole",
                'abbrev'=>"mol",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Candela",
                'abbrev'=>"cd",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"unit",
                'abbrev'=>"unit",
                'for_liquid'=>false,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
