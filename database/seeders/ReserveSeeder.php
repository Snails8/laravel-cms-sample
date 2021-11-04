<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserve')->insert([
            [
                'name' => 'sample name',
                'kana' => 'サンプル カナ',
                'tel' => 00011112222,
                'email' => 'sample@gmail.com',
                'reserve_date' => Carbon::now()->subDay(),
                'remarks' => 'sample 備考',
            ],
        ]);
    }
}
