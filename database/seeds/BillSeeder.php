<?php

use App\Bill;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bill::create([
            'payment_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Bill::create([
            'payment_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Bill::create([
            'payment_id'=>3,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
