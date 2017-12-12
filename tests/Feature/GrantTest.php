<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GrantTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    public function testGrantCreate_AnonymousAccessDenied( )
    {
        $response = $this->get('/grant/create' );
        $response->assertRedirect('/login');
    }

    public function testGrantCreate_basicResponse( )
    {
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
                        ->get('/grant/create' );
        $response->assertStatus(200);
        $response->assertSeeText(\Lang::get('messages.ui.grant_create'));
    }
    
    public function testGrantCreate_nullGrantObject( ) 
    {
        $user = factory(\App\User::class)->create( );

        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
                        ->get('/grant/create' );
        $response->assertStatus(200);
        
        $data = $response->getOriginalContent( )->getData( );
        $this->assertNull( $data["grant"] );
    }
        
    public function testGrantCreate_checkStatusObjectPopulated( )
    {

        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
                        ->get('/grant/create' );
        $response->assertStatus(200);
        
        $data = $response->getOriginalContent( )->getData( );
        $this->assertNotNull( $data["statuses"] );
        $this->assertInstanceOf( 'Illuminate\Support\Collection', $data["statuses"] );
        $this->assertGreaterThan( 1, $data["statuses"]->count( ) );
    }


    public function testGrantCreate_validators( )
    {

        $testData = [
            'project_title' => '',
            'project_description' => '',
            'application_date' => '',
            'status_id' => ''
        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
            ->call('POST', '/grant/create', array_merge( [ '_token' => csrf_token( ) ], $testData ) );

        $keys = ['project_title','project_description','application_date','status_id'];
        $response->assertSessionHasErrors( $keys );
    }

    public function testGrantCreate_recordIsCreated( )
    {
        
        $testData = [
            'project_title' => str_random(50),
            'project_description' => str_random(500),
            'application_date' => '01/01/2017',
            'status_id' => '2',
            'lead_organisation_id' => 1,
            'funding_round_id' => 1,
            'funding_agency_reference' => str_random(20),
            'funder_decision_date' => '02/01/2017',
            'planned_start_date' => '03/01/2017',
            'planned_end_date' => '04/01/2017',
            'actual_end_date' => '05/01/2017',
            'relinquished_date' => '06/01/2017',
            'transferred_in_date' => '07/01/2017',
            'transferred_in_organisation_id' => rand(1,50000),
            'transferred_out_date' => '07/01/2017',
            'transferred_out_organisation_id' => rand(1,50000),
        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
            ->call('POST', '/grant/create', array_merge( [ '_token' => csrf_token( ) ], $testData ) );
        //Too difficult to checking timestamps because we can't be sure of the exact moment of creation
        //SB recommends just leaving them out of the test
        $response->assertStatus(302);
        unset(  $testData["application_date"] );
        unset(  $testData["funder_decision_date"] );
        unset(  $testData["planned_start_date"] );
        unset(  $testData["planned_end_date"] );
        unset(  $testData["actual_end_date"] );
        unset(  $testData["relinquished_date"] );
        unset(  $testData["transferred_in_date"] );
        unset(  $testData["transferred_out_date"] );
        $this->assertDatabaseHas( 'grants', $testData );
    }
    
    public function testGrantCreate_recordIsUpdated( )
    {
        
        $testData = [
            'project_title' => str_random(50),
            'project_description' => str_random(500),
            'application_date' => '01/01/2017',
            'status_id' => '3',
            'lead_organisation_id' => 1,
            'funding_round_id' => 1,
            'funding_agency_reference' => str_random(20),
            'funder_decision_date' => '02/01/2017',
            'planned_start_date' => '03/01/2017',
            'planned_end_date' => '04/01/2017',
            'actual_end_date' => '05/01/2017',
            'relinquished_date' => '06/01/2017',
            'transferred_in_date' => '07/01/2017',
            'transferred_in_organisation_id' => rand(1,50000),
            'transferred_out_date' => '07/01/2017',
            'transferred_out_organisation_id' => rand(1,50000),

        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
            ->call('POST', '/grant/edit/1', array_merge( [ '_token' => csrf_token( ) ], $testData ) );
        $response->assertStatus(302);
        //Too difficult to checking timestamps because we can't be sure of the exact moment of creation
        //SB recommends just leaving them out of the test
        //unset(  $testData["application_date"] );
       // $testData["id"] = 1;
        $checkDb = $testData;
        unset(  $checkDb["application_date"] );
        unset(  $checkDb["funder_decision_date"] );
        unset(  $checkDb["planned_start_date"] );
        unset(  $checkDb["planned_end_date"] );
        unset(  $checkDb["actual_end_date"] );
        unset(  $checkDb["relinquished_date"] );
        unset(  $checkDb["transferred_in_date"] );
        unset(  $checkDb["transferred_out_date"] );
        $this->assertDatabaseHas( 'grants', $checkDb);
        
        //Now going to iterate through individual values to check expected:
        $g = \App\Grant::find( 1 );
        foreach( $testData as $i => $v )
        {
            $this->assertEquals( $g->getAttribute($i), $v);
        }


    }

    public function testGrantEdit_basicResponse( )
    {
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
                        ->get('/grant/edit/1' );
        
        $response->assertStatus(200);
        $response->assertSeeText(\Lang::get('messages.ui.grant_edit'));
    }

    public function testGrantEdit_GrantObject( ) 
    {
        $user = factory(\App\User::class)->create( );

        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
                        ->get('/grant/edit/1' );
        $response->assertStatus(200);
        
        $data = $response->getOriginalContent( )->getData( );
        $this->assertNotNull( $data["grant"] );
        $this->assertInstanceOf( 'App\Grant', $data["grant"] );
    }
    
    public function testGrant_xferOrgValidation( )
    {
        $testData = [
            'project_title' => str_random(50),
            'project_description' => str_random(500),
            'application_date' => '01/01/2017',
            'status_id' => '2',
            'lead_organisation_id' => 1,
            'funding_round_id' => 1,
            'funding_agency_reference' => str_random(20),
            'funder_decision_date' => '02/01/2017',
            'planned_start_date' => '03/01/2017',
            'planned_end_date' => '04/01/2017',
            'actual_end_date' => '05/01/2017',
            'relinquished_date' => '06/01/2017',
            'transferred_in_date' => '07/01/2017',
            //'transferred_in_organisation_id' => rand(1,50000),
            'transferred_out_date' => '07/01/2017',
            //'transferred_out_organisation_id' => rand(1,50000),
        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )
            ->call('POST', '/grant/create', array_merge( [ '_token' => csrf_token( ) ], $testData ) );
        //Too difficult to checking timestamps because we can't be sure of the exact moment of creation
        //SB recommends just leaving them out of the test
        $response->assertStatus(302);
        $response->assertSessionHasErrors();

    }
    public function testGrant_xferDateValidation( )
    {
        $testData = [
            'project_title' => str_random(50),
            'project_description' => str_random(500),
            'application_date' => '01/01/2017',
            'status_id' => '2',
            'lead_organisation_id' => 1,
            'funding_round_id' => 1,
            'funding_agency_reference' => str_random(20),
            'funder_decision_date' => '02/01/2017',
            'planned_start_date' => '03/01/2017',
            'planned_end_date' => '04/01/2017',
            'actual_end_date' => '05/01/2017',
            'relinquished_date' => '06/01/2017',
            //'transferred_in_date' => '07/01/2017',
            'transferred_in_organisation_id' => rand(1,50000),
            //'transferred_out_date' => '07/01/2017',
            'transferred_out_organisation_id' => rand(1,50000),
        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )
            ->call('POST', '/grant/create', array_merge( [ '_token' => csrf_token( ) ], $testData ) );
        //Too difficult to checking timestamps because we can't be sure of the exact moment of creation
        //SB recommends just leaving them out of the test
        $response->assertStatus(302);
        $response->assertSessionHasErrors();

    }

}
