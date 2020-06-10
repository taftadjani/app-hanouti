<?php

use App\SubComment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 10000; $i++) {
            SubComment::create([
                'sender_id'=>$faker->numberBetween(1,50),
                'comment_id'=>$faker->numberBetween(1,10200),
                'content'=>$faker->text(50),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
