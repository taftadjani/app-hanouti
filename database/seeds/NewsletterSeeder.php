<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsletters')->insert([
            [
                'inserted_by'=>1,
                'mail'=>"newsletter1@gmail.com",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'inserted_by'=>2,
                'mail'=>"newsletter2@gmail.com",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'inserted_by'=>3,
                'mail'=>"newsletter3@gmail.com",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
