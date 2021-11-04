<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')
            ->insert([
                [
                    'name' => 'アップデート情報',
                    'sort_no' => 1,
                ],
                [
                    'name' => 'メンテナンス',
                    'sort_no' => 2,
                ],
                [
                    'name' => '障害情報',
                    'sort_no' => 3,
                ],
                [
                    'name' => 'お知らせ',
                    'sort_no' => 4,
                ],
                [
                    'name' => 'キャンペーン',
                    'sort_no' => 3,
                ],

            ]);
    }
}
