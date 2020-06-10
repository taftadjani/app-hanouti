<?php

use App\Follow;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Follow::create([
            'followed_by'=>3,
            'followable_id'=>2,
            'followable_type'=>'user',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Follow::create([
            'followed_by'=>3,
            'followable_id'=>1,
            'followable_type'=>'user',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Follow::create([
            'followed_by'=>2,
            'followable_id'=>1,
            'followable_type'=>'user',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Follow::create([
            'followed_by'=>3,
            'followable_id'=>1,
            'followable_type'=>'company',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Follow::create([
            'followed_by'=>3,
            'followable_id'=>1,
            'followable_type'=>'store',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        Follow::create([
            'followed_by'=>2,
            'followable_id'=>1,
            'followable_type'=>'store',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
