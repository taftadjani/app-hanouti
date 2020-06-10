<?php

use App\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::create([
            'inserted_by'=>1,
            'discountable_id'=>1,
            'discountable_type'=>'order',
            'percentage'=>0.2,
            'enabled'=>true,
            'start_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Discount::create([
            'inserted_by'=>1,
            'discountable_id'=>1,
            'discountable_type'=>'product_store',
            'percentage'=>0.3,
            'enabled'=>true,
            'start_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
