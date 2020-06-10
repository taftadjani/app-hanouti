<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarningTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warning_types')->insert([
            [
                'name'=>"Spam",
                'gravity'=>1,
                'description'=>"Spam ses clients avec des messages",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Image quality",
                'gravity'=>1,
                'description'=>"Images de mauvaises qualitées",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
