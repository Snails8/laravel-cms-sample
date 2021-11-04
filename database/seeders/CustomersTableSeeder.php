<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'たにし',
                'kana' => 'タニシ',
                'tel' => '11122223333',
                'email' => 'sample$gmail.com',
                'password' => bcrypt('password')
            ],
        ]);
    }
}
