<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'sender_id'=>1,
                'receiver_id'=>2,
                'content'=>"Message 1 -> 2",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sender_id'=>1,
                'receiver_id'=>3,
                'content'=>"Message 1 -> 3",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sender_id'=>2,
                'receiver_id'=>1,
                'content'=>"Message 2 -> 1",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sender_id'=>2,
                'receiver_id'=>3,
                'content'=>"Message 2 -> 3",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sender_id'=>3,
                'receiver_id'=>1,
                'content'=>"Message 3 -> 1",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'sender_id'=>3,
                'receiver_id'=>2,
                'content'=>"Message 3 -> 2",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
