<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modeles')->insert([
            // Apple
            [
                'name'=>'iPhone 11 Pro',
                'brand_id'=>1,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'iPhone 11 Pro Max',
                'brand_id'=>1,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'iPhone 11',
                'brand_id'=>1,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'iPhone XS',
                'brand_id'=>1,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Toyota
            [
                'name'=>'Aygo',
                'brand_id'=>5,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'GR Supra',
                'brand_id'=>5,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Land Cruiser',
                'brand_id'=>5,
                'inserted_by'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        ]);
    }
}
