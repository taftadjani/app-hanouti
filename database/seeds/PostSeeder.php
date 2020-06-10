<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'posted_by'=>1,
            'store_id'=>1,
            'content'=>'Post 11',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Post::create([
            'posted_by'=>2,
            'store_id'=>2,
            'content'=>'Post 22',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Post::create([
            'posted_by'=>1,
            'store_id'=>1,
            'content'=>'Post 11',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
