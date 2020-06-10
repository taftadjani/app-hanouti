<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'reference' => 'HANOUTI_APP_ADMIN',
            'description' => 'Admin role',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'seller',
            'reference' => 'HANOUTI_APP_SELLER',
            'description' => 'Seller role',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'customer',
            'reference' => 'HANOUTI_APP_CUSTOMER',
            'description' => 'Customer role',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
