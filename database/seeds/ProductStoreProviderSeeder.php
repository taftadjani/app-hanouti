<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStoreProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store_provider')->insert([
            [
                'product_store_id'=>1,
                'provider_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_store_id'=>1,
                'provider_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_store_id'=>1,
                'provider_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
