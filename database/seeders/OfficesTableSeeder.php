<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            [
                'company_id' => 1,
                'name' => '東京本社',
                'address' => '東京都新宿区hoge3丁目1番地1 hogeビル',
                'tel' => '0000-111-1111',
                'manager' => '代表者名サンプル',
                'post' => '代表者肩書サンプル',
            ],
            [
                'company_id' => 1,
                'name' => '札幌支社',
                'address' => '北海道札幌市北hogehoge',
                'tel' => '0000-111-1111',
                'manager' => '代表者名サンプル',
                'post' => '代表者肩書サンプル',
            ],
            [
                'company_id' => 1,
                'name' => '名古屋支社',
                'address' => '愛知県名古屋市栄 hogehoge',
                'tel' => '0000-111-1111',
                'manager' => '代表者名サンプル',
                'post' => '代表者肩書サンプル',
            ],
            [
                'company_id' => 1,
                'name' => '大阪支社',
                'address' => '大阪府大阪市hogehoge',
                'tel' => '0000-111-1111',
                'manager' => '代表者名サンプル',
                'post' => '代表者肩書サンプル',
            ],
            [
                'company_id' => 1,
                'name' => '福岡支社',
                'address' => '福岡県博多市fugafuga',
                'tel' => '0000-111-1111',
                'manager' => '代表者名サンプル',
                'post' => '代表者肩書サンプル',
            ],
        ]);
    }
}
