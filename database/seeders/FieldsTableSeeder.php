<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $prefectures = [
            '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', 
            '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県', 
            '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', 
            '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', 
            '奈良県', '和歌山県', '鳥取県', '島根県', '岡山県', '広島県', '山口県', 
            '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', 
            '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
        ];

        foreach ($prefectures as $prefecture) {
            DB::table('fields')->insert([
                'name' => $prefecture. 'サバイバルゲームフィールド',
                'tel' => $this->randomPhoneNumber(),
                'post' => $this->randomPostCode(),
                'address' => $prefecture,
                'detail' => $prefecture. 'にあるサバイバルゲームフィールドです。',
                'image' => Str::random(30),
                'url' => Str::random(30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function randomPhoneNumber()
    {
        return '0' . mt_rand(1000000000, 9999999999); // 0から始まるランダムな10桁の数字
    }

    private function randomPostCode()
    {
        return mt_rand(100, 999) . '-' . mt_rand(1000, 9999); // XXX-XXXX形式の郵便番号
    }
}
