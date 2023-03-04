<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '4',
            'store_id' => '1',
            'star' => '3',
            'comment' => 'また行きたいです。',
        ];
        Comment::create($param);

        $param = [
            'user_id' => '5',
            'store_id' => '2',
            'star' => '5',
            'comment' => '美味しかったです。',
        ];
        Comment::create($param);
    }
}
