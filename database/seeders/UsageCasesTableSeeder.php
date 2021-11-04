<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsageCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usage_cases')->insert([
            [
                'title'    => 'テスト',
                'image'    => '',
                'introduction'  => 'aaaaaaaaaaaaaaaaaaaaaaaaa',
                'hr_company_id' => 1,
            ],
        ]);
    }
}
