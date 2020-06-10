<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStoreModeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store_modele')->insert([
            [
                'modele_id'=>1,
                'product_store_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'modele_id'=>2,
                'product_store_id'=>5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
