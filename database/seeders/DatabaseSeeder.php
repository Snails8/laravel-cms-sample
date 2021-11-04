<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * お問い合わせ
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(NewsCategoriesTableSeeder::class);
        $this->call(HrCompaniesTableSeeder::class);
        $this->call(HrCompanyContractsTableSeeder::class);
        $this->call(HrUsersTableSeeder::class);
        $this->call(HrOfficesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(UsageCasesTableSeeder::class);
    }
}
