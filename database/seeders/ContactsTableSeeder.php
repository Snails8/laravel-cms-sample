<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * お問い合わせ
 */
class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'company' => '会社名',
            'name' => 'test名前',
            'email' => 'sample@gmail.com',
            'tel' => 0011112222,
            'employee_count' => 2,
            'contact_type' => 1,
            'detail' => 'test 詳細',
            'created_at' => new Carbon(),
        ]);
    }
}
