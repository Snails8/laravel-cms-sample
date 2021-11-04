<?php

namespace Database\Seeders;

use App\Models\HrCompany;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HrCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_companies')->insert([
            [
                'name'    => 'sample name',
                'zipcode' => 1112222,
                'address' => 'sample address',
                'address_other' => 'sample_address_other',
                'tel'     => 11122223333,
                'email'   => 'sample@test.com',
                'representative' => 'sample representative',
                'role'    => 'Free',
                'is_contract' => true,
            ],
            [
                'name'    => 'sample name2',
                'zipcode' => 1112222,
                'address' => 'sample address2',
                'address_other' => 'sample_address_other2',
                'tel'     => 11122223333,
                'email'   => 'sample2@test.com',
                'representative' => 'sample representative2',
                'role'    => 'Standard',
                'is_contract' => true,
            ],
        ]);

        HrCompany::factory(20)->create();
    }
}
