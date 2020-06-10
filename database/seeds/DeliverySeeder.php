<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            [
                'delivery_mode_id'=>1,
                'user_id'=>2,
                'delivery_date'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'delivery_mode_id'=>3,
                'user_id'=>2,
                'delivery_date'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'delivery_mode_id'=>4,
                'user_id'=>3,
                'delivery_date'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'delivery_mode_id'=>2,
                'user_id'=>3,
                'delivery_date'=>now(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
