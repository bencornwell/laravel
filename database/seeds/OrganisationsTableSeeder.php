<?php

use Illuminate\Database\Seeder;

class OrganisationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisations')->insert([
            'id' => 1,
            'name' => 'University of Foo',
            'abbreviation' => 'UOF',
            'organisation_type_id' => 1,
            'country_id' => 99,
            'url' => 'http://www.uof.edu.au',
            'phone_number' => '02 1234 5678',
            'email_address' => 'foo@uof.edu.au',
            'fax' => '02 8765 4321',
            'address_one' => 'Some Fancy Building Name',
            'address_two'=> '42 Something Street',
            'address_city' => 'FooTown',
            'address_province' => 'Foo South Wales',
            'address_postcode' => '4242'
        ]);
        DB::table('organisations')->insert([
            'id' => 2,
            'name' => 'Automatic Research Council',
            'abbreviation' => 'ARC',
            'organisation_type_id' => 3,
            'country_id' => 99,
            'url' => 'http://www.arc.gov.au',
            'phone_number' => '02 1234 5678',
            'email_address' => 'foo@arc.gov.au',
            'fax' => '02 8765 4321',
            'address_one' => 'Some Fancy Building Name',
            'address_two'=> '2 Some Ave',
            'address_city' => 'Canberra',
            'address_province' => 'Automatic Captial Territory',
            'address_postcode' => '2222'
        ]);
        DB::table('organisations')->insert([
            'id' => 3,
            'name' => 'New Health and Medicial Research Council',
            'abbreviation' => 'NHMRC',
            'organisation_type_id' => 3,
            'country_id' => 99,
            'url' => 'http://www.nhmrc.gov.au',
            'phone_number' => '02 1234 5678',
            'email_address' => 'foo@nhmrc.gov.au',
            'fax' => '02 8765 4321',
            'address_one' => 'Some Fancy Building Name',
            'address_two'=> '2 Some Ave',
            'address_city' => 'Canberra',
            'address_province' => 'Automatic Captial Territory',
            'address_postcode' => '2222'
        ]);
    }
}
