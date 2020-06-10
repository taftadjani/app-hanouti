<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seens')->insert([
            [
                'user_id'=>2,
                'seenable_id'=>2,
                'seenable_type'=>'store',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>2,
                'seenable_id'=>2,
                'seenable_type'=>'product_store',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>2,
                'seenable_id'=>2,
                'seenable_type'=>'company',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>3,
                'seenable_id'=>2,
                'seenable_type'=>'product_store',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>3,
                'seenable_id'=>2,
                'seenable_type'=>'company',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
