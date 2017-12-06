<?php

use Illuminate\Database\Seeder;

class FundingSchemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funding_schemes')->insert([
            'id' => 1,
            'name' => 'Recovery Projects',
            'agency_id' => 2,
            'url' => 'https://www.arc.gov.au',
        ]);
        DB::table('funding_schemes')->insert([
            'id' => 2,
            'name' => 'Project Grants',
            'agency_id' => 3,
            'url' => 'https://www.nhmrc.gov.au',
        ]);
    }
}
