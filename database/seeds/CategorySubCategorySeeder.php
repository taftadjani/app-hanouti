<?php

use App\Category;
use App\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_sub_category')->insert([
            // Book
            [
                'category_id'=>Category::where('name', 'Stationery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Book')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Video game
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Video game')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Video game')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Software')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Video game')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Phone & Tablet
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Phone & Tablet')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Phone & Tablet')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Phone & Tablet')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Console
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Console')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Console')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Game & Toy')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Console')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Console')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Laptop
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Laptop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Laptop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Laptop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // Desktop
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Desktop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Desktop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Desktop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Desktop')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Mouse
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Mouse')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ], [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Mouse')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Mouse')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Mouse')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer component')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Mouse')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Device')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Mouse')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Motherboard
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Motherboard')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ], [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Motherboard')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Motherboard')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Motherboard')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer component')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Motherboard')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Device')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Motherboard')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Keyboard
                [
                    'category_id'=>Category::where('name', 'Computer science')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Keyboard')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ], [
                    'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Keyboard')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Desktop')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Keyboard')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Hardware')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Keyboard')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Computer component')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Keyboard')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Device')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Keyboard')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                // Scanner
                    [
                        'category_id'=>Category::where('name', 'Computer science')->first()->id,
                        'sub_category_id'=>SubCategory::where('name', 'Scanner')->first()->id,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ], [
                        'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                        'sub_category_id'=>SubCategory::where('name', 'Scanner')->first()->id,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ],
                    [
                        'category_id'=>Category::where('name', 'Desktop')->first()->id,
                        'sub_category_id'=>SubCategory::where('name', 'Scanner')->first()->id,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ],
                    [
                        'category_id'=>Category::where('name', 'Hardware')->first()->id,
                        'sub_category_id'=>SubCategory::where('name', 'Scanner')->first()->id,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ],
                    [
                        'category_id'=>Category::where('name', 'Computer component')->first()->id,
                        'sub_category_id'=>SubCategory::where('name', 'Scanner')->first()->id,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ],
                    [
                        'category_id'=>Category::where('name', 'Device')->first()->id,
                        'sub_category_id'=>SubCategory::where('name', 'Scanner')->first()->id,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ],
            // Printer
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Printer')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ], [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Printer')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Printer')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Printer')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer component')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Printer')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Device')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Printer')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Storage device
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ], [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer component')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Device')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Microcontroller
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ], [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hardware')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer component')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Device')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Electronic')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // notebook
                [
                    'category_id'=>Category::where('name', 'Stationery')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            // Pen
            [
                'category_id'=>Category::where('name', 'Stationery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Desktop')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Scripture')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Storage device')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Pencil
                [
                    'category_id'=>Category::where('name', 'Stationery')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Pencil')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Desktop')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Pencil')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Scripture')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Pencil')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            // Shoe
            [
                'category_id'=>Category::where('name', 'Clothing')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Shoe')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // plush
                [
                    'category_id'=>Category::where('name', 'Game & Toy')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'plush')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
        // Clothing
            [
                'category_id'=>Category::where('name', 'Clothing')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Clothing')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // Soap
                [
                    'category_id'=>Category::where('name', 'Beauty')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Soap')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Home')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Soap')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Cleaning product')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Soap')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Toiletry')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Soap')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            // shampoo
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'shampoo')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Hair')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'shampoo')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Cleaning product')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'shampoo')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Toiletry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'shampoo')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Laundry
            [
                'category_id'=>Category::where('name', 'Cleaning product')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Laundry')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Toiletry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Laundry')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Home')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Laundry')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Lye
                [
                    'category_id'=>Category::where('name', 'Cleaning product')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Lye')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Toiletry')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Lye')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'category_id'=>Category::where('name', 'Home')->first()->id,
                    'sub_category_id'=>SubCategory::where('name', 'Lye')->first()->id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
        // refrigerator
            [
                'category_id'=>Category::where('name', 'Home')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Refrigerator')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Home appliance')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Refrigerator')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Kitchen')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Refrigerator')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            // Perfume
            [
                'category_id'=>Category::where('name', 'Hair')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Perfume')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Perfume')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Hairstyle
            [
                'category_id'=>Category::where('name', 'Hair')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Hairstyle')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Hairstyle')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Backpack
            [
                'category_id'=>Category::where('name', 'Bag')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Backpack')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Hand bag
            [
                'category_id'=>Category::where('name', 'Bag')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Hand bag')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // suitcase
            [
                'category_id'=>Category::where('name', 'Bag')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'suitcase')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Ring
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Ring')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Ring')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Headband
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Headband')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Headband')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Barette
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Barette')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Barette')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Jewelry
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Jewelry')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Bracelet
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Bracelet')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Bracelet')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Chain
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Chain')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Chain')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Watches
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Watches')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Watches')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Pendant
            [
                'category_id'=>Category::where('name', 'Jewelry')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Pendant')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Beauty')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Pendant')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // balls
            [
                'category_id'=>Category::where('name', 'Game & Toy')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'balls')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Sport')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'balls')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Oil and Fluids
            [
                'category_id'=>Category::where('name', 'Home')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Oil and Fluids')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Kitchen')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Oil and Fluids')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Oil and Fluids')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Glass sun visor
            [
                'category_id'=>Category::where('name', 'Automobile')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Glass sun visor')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Glass sun visor')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Automotive shampoos
            [
                'category_id'=>Category::where('name', 'Automobile')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Automotive shampoos')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Aromatic herb
            [
                'category_id'=>Category::where('name', 'Kitchen')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Aromatic herb')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Aromatic herb')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Oil
            [
                'category_id'=>Category::where('name', 'Kitchen')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Oil')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Oil')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Pasta & noodle
            [
                'category_id'=>Category::where('name', 'Kitchen')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Pasta & noodle')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Pasta & noodle')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Confectionery & chocolate
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Confectionery & chocolate')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Food')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Confectionery & chocolate')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // spice & aroma
            [
                'category_id'=>Category::where('name', 'Kitchen')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'spice & aroma')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'spice & aroma')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Snack
            [
                'category_id'=>Category::where('name', 'Food')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Snack')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Snack')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Jams
            [
                'category_id'=>Category::where('name', 'Grocery')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Jams')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Food')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Jams')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Camera & Camcorder
            [
                'category_id'=>Category::where('name', 'Photgraphy')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Camera & Camcorder')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Camera & Camcorder')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Camera & Camcorder')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            // Headphone
            [
                'category_id'=>Category::where('name', 'Photgraphy')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Headphone')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'High-Tech & Gadget')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Headphone')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'category_id'=>Category::where('name', 'Computer science')->first()->id,
                'sub_category_id'=>SubCategory::where('name', 'Headphone')->first()->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
