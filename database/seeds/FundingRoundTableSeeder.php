<?php

use Illuminate\Database\Seeder;

class FundingRoundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funding_rounds')->insert([
            'id' => 1,
            'name' => 'Example Round',
            'funding_scheme_id' => 1,
            'start_date' => '2017-01-01',
            'end_date' => null,
            'acgr' => 1,
            'url' => 'http://www.arc.gov.au/',
            'agency_reference' => 'DP1701',
        ]);
        DB::table('funding_rounds')->insert([
            'id' => 2,
            'name' => 'Another Example Round',
            'funding_scheme_id' => 1,
            'start_date' => '2016-01-01',
            'end_date' => '2016-12-31',
            'acgr' => 1,
            'url' => 'http://www.arc.gov.au/',
            'agency_reference' => 'DP1601',
        ]);
    }
}
