<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AppSettingsSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(GrantsTableSeeder::class);
        $this->call(OrganisationsTableSeeder::class);
        $this->call(OrganisationTypeTableSeeder::class);
        $this->call(FundingRoundTableSeeder::class);
        $this->call(FundingSchemeTableSeeder::class);
    }
}
