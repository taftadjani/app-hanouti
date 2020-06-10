<?php

use App\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'payment_method_id'=>1,
            'order_id'=>1,
            'amount'=>9000,
            'paids'=>true,
            'user_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Payment::create([
            'payment_method_id'=>2,
            'order_id'=>1,
            'amount'=>1000,
            'paids'=>false,
            'user_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Payment::create([
            'payment_method_id'=>2,
            'order_id'=>1,
            'amount'=>1000,
            'paids'=>true,
            'user_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
