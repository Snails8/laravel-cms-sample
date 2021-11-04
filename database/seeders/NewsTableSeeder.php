<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'title'  => 'お知らせサンプル',
                'body'  => '夏季休暇のため、8月13日、14日、15日は休業とさせていただきます',
                'public_date' => Carbon::now(),
                'image' => '',
                'description' => 'sample description',
                'is_public' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
