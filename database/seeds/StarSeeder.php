<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stars')->insert([
            [
                'inserted_by'=>2,
                'starable_id'=>2,
                'starable_type'=>'store',
                'value'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'inserted_by'=>2,
                'starable_id'=>2,
                'starable_type'=>'product_store',
                'value'=>5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'inserted_by'=>2,
                'starable_id'=>2,
                'starable_type'=>'company',
                'value'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'inserted_by'=>3,
                'starable_id'=>2,
                'starable_type'=>'product_store',
                'value'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'inserted_by'=>3,
                'starable_id'=>2,
                'starable_type'=>'company',
                'value'=>4,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
