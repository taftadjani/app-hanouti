<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Product::create([
            'name'=>'Product 1',
            'inserted_by'=>1,
            'reference'=>'Ref2020007',
            'is_liquid'=>0,
            'images'=>json_encode(['1_1589572529.jpg','1_1589573177.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'Product 2',
            'inserted_by'=>1,
            'reference'=>'Ref2020005',
            'is_liquid'=>1,
            'images'=>json_encode(['1_1589572529.jpg','1_1589573177.jpg','1_1589697705_product_images.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'Product 3',
            'inserted_by'=>2,
            'reference'=>'Ref2020004',
            'is_liquid'=>1,
            'images'=>json_encode(['1_1589572529.jpg','1_1589697705_product_images.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'Product 4',
            'inserted_by'=>2,
            'reference'=>'Ref2020003',
            'is_liquid'=>0,
            'images'=>json_encode(['1_1589573177.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'Product 5',
            'inserted_by'=>1,
            'reference'=>'Ref2020002',
            'is_liquid'=>0,
            'images'=>json_encode(['1_1589573177.jpg','1_1589697705_product_images.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'Product 6',
            'inserted_by'=>1,
            'reference'=>'Ref2020001',
            'is_liquid'=>1,
            'images'=>json_encode(['1_1589572529.jpg','1_1589697705_product_images.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'NO REFERENCE',
            'inserted_by'=>1,
            'reference'=>'NO-REF-LIQUID',
            'is_liquid'=>1,
            'images'=>json_encode(['1_1589572529.jpg','1_1589573177.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Product::create([
            'name'=>'NO REFERENCE',
            'inserted_by'=>1,
            'reference'=>'NO-REF-SOLID',
            'is_liquid'=>0,
            'images'=>json_encode(['1_1589572529.jpg']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
