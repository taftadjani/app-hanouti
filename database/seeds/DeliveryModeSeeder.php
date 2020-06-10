<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_modes')->insert([
            [
                'name'=>"Purchase at the store",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Delivery by the seller",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Delivery by Hanouti",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Delivery by a third party",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]
        );
    }
}
