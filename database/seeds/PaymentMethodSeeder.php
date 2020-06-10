<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name'=>"Bank card",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Cash on delivery",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"At the store",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Bank check",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>"Paypal",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
