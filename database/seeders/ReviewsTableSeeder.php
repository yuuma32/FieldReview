<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 全てのユーザーとフィールドを取得
        $users = DB::table('users')->get();
        $fields = DB::table('fields')->get();

        foreach ($users as $user) {
            foreach ($fields as $field) {
                $rating = rand(1, 5);
                $comment = $this->generateComment($rating);

                DB::table('reviews')->insert([
                    'field_id' => $field->id,
                    'user_id' => $user->id,
                    'rating' => $rating,
                    'comment' => $comment,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }    
    }

    private function generateComment($rating)
    {
        switch ($rating) {
            case 1:
                return '全く楽しめませんでした。';
            case 2:
                return 'あまり楽しめませんでした。';
            case 3:
                return '普通なフィールドでした。';
            case 4:
                return '楽しく遊べてよかった！';
            case 5:
                return 'とても楽しく遊べてよかった！';
            default:
                return 'No Comment';
        }
    } 
}
