<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HrCompanyContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_company_contracts')->insert([
            [
                'hr_company_id' => 1,
                'contract_date' => Carbon::now()->subDay(),
                'credit_card'   => 1111222233334444
            ],
            [
                'hr_company_id' => 2,
                'contract_date' => Carbon::now()->subDay(),
                'credit_card'   => 1111222233334444
           ],
            [
                'hr_company_id' => 3,
                'contract_date' => Carbon::now()->subDay(),
                'credit_card'   => 1111222233334444
            ],
            [
                'hr_company_id' => 4,
                'contract_date' => Carbon::now()->subDay(),
                'credit_card'   => 1111222233334444
            ],
        ]);
    }
}
