<?php

use Illuminate\Database\Seeder;

class GrantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grants')->insert([
            'project_title' => 'test project',
            'project_description' => 'test project description',
            'status_id' => 1,
            'lead_organisation_id' => 1,
            'application_date' => '2017-01-01',
            'funding_round_id' => 1,
            'funding_agency_reference' => 1,
            'user_id' => 1,
        ]);
    }
}
