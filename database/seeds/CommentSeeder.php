<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 100; $i++) {
            Comment::create([
                'sender_id'=>$faker->numberBetween(1,10),
                'content'=>$faker->text,
                'commentable_id'=>$faker->numberBetween(1,50),
                'commentable_type'=>'product_store',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
        // for ($i=0; $i < 100; $i++) {
        //     Comment::create([
        //         'sender_id'=>$faker->numberBetween(1,10),
        //         'content'=>$faker->text,
        //         'commentable_id'=>$faker->numberBetween(1,10),
        //         'commentable_type'=>'store',
        //         'created_at'=>now(),
        //         'updated_at'=>now(),
        //     ]);
        // }
        // for ($i=0; $i < 100; $i++) {
        //     Comment::create([
        //         'sender_id'=>$faker->numberBetween(1,10),
        //         'content'=>$faker->text,
        //         'commentable_id'=>$faker->numberBetween(1,10),
        //         'commentable_type'=>'company',
        //         'created_at'=>now(),
        //         'updated_at'=>now(),
        //     ]);
        // }
    }
}
