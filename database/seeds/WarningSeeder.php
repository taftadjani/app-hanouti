<?php

use App\Warning;
use Illuminate\Database\Seeder;

class WarningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warning::create([
            'admin_id'=>1,
            'user_id'=>2,
            'warning_type_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Warning::create([
            'admin_id'=>1,
            'user_id'=>2,
            'warning_type_id'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Warning::create([
            'admin_id'=>1,
            'user_id'=>3,
            'warning_type_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
