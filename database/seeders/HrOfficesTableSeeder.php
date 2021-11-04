<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HrOfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_offices')->insert([
            [
                'hr_company_id' => 1,
                'name' => '名古屋支社',
                'address' => '住所',
                'tel' => 11122223333,
                'manager' => 'sample manager',
                'post' => 'sample post',
            ]
        ]);
    }
}
