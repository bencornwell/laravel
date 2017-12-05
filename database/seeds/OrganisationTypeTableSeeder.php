<?php

use Illuminate\Database\Seeder;

class OrganisationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisation_types')->insert([
            'id' =>1,
            'name' => 'University'
        ]);
        DB::table('organisation_types')->insert([
            'id' =>2,
            'name' => 'Commercial'
        ]);
        DB::table('organisation_types')->insert([
            'id' =>3,
            'name' => 'Funding Agency'
        ]);
        DB::table('organisation_types')->insert([
            'id' =>4,
            'name' => 'Government'
        ]);
        DB::table('organisation_types')->insert([
            'id' =>5,
            'name' => 'Non-Profit'
        ]);
    }
}
