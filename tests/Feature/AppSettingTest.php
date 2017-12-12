<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppSettingTest extends TestCase
{
    public function testAppSetting_AnonymousAccessDenied( )
    {
        $response = $this->get('/grant/create' );
        $response->assertRedirect('/login');
    }
    
    public function testAppSetting_nonAdminAccessRedirected( )
    {
        $user = factory(\App\User::class)->create( );
        $response = $this->actingAs($user )// , 'ben@bencornwell.com')
                        ->get('/appsettings' );
        $response->assertStatus(302);
        $response->assertRedirect( '/home' );
    }
    
    public function testAppSetting_adminAccessOkay( )
    {
        $user = factory(\App\User::class)->create( );
        $user->id = 2;
        $this->be($user);

        $response = //$this->actingAs($user )// , 'ben@bencornwell.com')
                       $this->get('/appsettings' );
        $response->assertStatus(200);
    }
}
