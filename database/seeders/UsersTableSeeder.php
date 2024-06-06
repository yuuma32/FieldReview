<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザーのデータを配列で定義
        $users = [
            ['id' => Str::uuid(), 'name' => '田中', 'email' => 'tanaka@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '佐藤', 'email' => 'sato@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '渡辺', 'email' => 'watanabe@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '木村', 'email' => 'kimura@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '森', 'email' => 'mori@example.com', 'password' => Hash::make('password')],
        ];

        // 各ユーザーをデータベースのusersテーブルに挿入
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
