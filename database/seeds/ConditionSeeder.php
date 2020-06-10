<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->insert([
            [
                'name'=>"Brand new",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Like new",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Excellent",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Very Good",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Good",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"used",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Fair",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Poor",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Non fonctioning",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Bad Condition",
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        ]);
    }
}
