<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            ['Phil', 'I cannot wait for Christmas!', 2],
            ['Elizabeth', 'Christmas is my favorite holiday.', 2],
            ['Phil', 'My birthday is awesome!', 5]
        ];
        $count = count($comments);

        foreach ($comments as $commentData) {
            $comment = new Comment();

            $comment->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $comment->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $comment->name = $commentData[0];
            $comment->comment = $commentData[1];
            $comment->event_id = $commentData[2];

            $comment->save();

            $count--;
        }
    }
}
