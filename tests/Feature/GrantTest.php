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
            'status_id' => '2'
        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
            ->call('POST', '/grant/create', array_merge( [ '_token' => csrf_token( ) ], $testData ) );
        //Too difficult to checking timestamps because we can't be sure of the exact moment of creation
        //SB recommends just leaving them out of the test
        unset(  $testData["application_date"] );
        $this->assertDatabaseHas( 'grants', $testData );
    }
    
    public function testGrantCreate_recordIsUpdated( )
    {
        
        $testData = [
            'project_title' => str_random(50),
            'project_description' => str_random(500),
            'application_date' => '01/01/2017',
            'status_id' => '3'
        ];
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
            ->call('POST', '/grant/edit/1', array_merge( [ '_token' => csrf_token( ) ], $testData ) );
        //Too difficult to checking timestamps because we can't be sure of the exact moment of creation
        //SB recommends just leaving them out of the test
        unset(  $testData["application_date"] );
        $testData["id"] = 1;
        $this->assertDatabaseHas( 'grants', $testData );
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

}
