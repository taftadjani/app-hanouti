<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'user_id'=>1,
                'value'=>"english",
                'iso_code'=>"",
                'description'=>"",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>1,
                'value'=>"french",
                'iso_code'=>"",
                'description'=>"",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>1,
                'value'=>"arabic",
                'iso_code'=>"",
                'description'=>"",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>2,
                'value'=>"english",
                'iso_code'=>"",
                'description'=>"",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>2,
                'value'=>"french",
                'iso_code'=>"",
                'description'=>"",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>3,
                'value'=>"arabic",
                'iso_code'=>"",
                'description'=>"",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
