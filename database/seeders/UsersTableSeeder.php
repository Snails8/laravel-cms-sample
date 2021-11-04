<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'  => 'たにし',
                'kana'  => 'タニシ',
                'email' => 'sample@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'role'       => 'master',
                'post'       => '',
                'office_id'    => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
        ]);
    }
}
