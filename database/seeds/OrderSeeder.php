<?php

use App\Currency;
use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'currency_id'=>Currency::where('number',504)->first()->id,
            'order_by'=>2,
            'status'=>'New',
            'paids'=>0,
            'delivery_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Order::create([
            'currency_id'=>Currency::where('number',504)->first()->id,
            'order_by'=>2,
            'status'=>'New',
            'paids'=>0,
            'delivery_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Order::create([
            'currency_id'=>Currency::where('number',504)->first()->id,
            'order_by'=>3,
            'status'=>'New',
            'paids'=>0,
            'delivery_id'=>4,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
