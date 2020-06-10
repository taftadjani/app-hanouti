<?php

use App\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'complete_name'=>'Provider 1 - 1',
            'inserted_by'=>1,
        ]);
        Provider::create([
            'complete_name'=>'Provider 1 - 2',
            'inserted_by'=>1,
        ]);
        Provider::create([
            'complete_name'=>'Provider 2 - 1',
            'inserted_by'=>2,
        ]);
        Provider::create([
            'complete_name'=>'Provider 2 - 1',
            'inserted_by'=>2,
        ]);
    }
}
