<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin= new Role( );
        $role_admin->name = 'administrator';
        $role_admin->description = 'An admin user';
        $role_admin->save( );

        $role_basic = new Role( );
        $role_basic->name = 'user';
        $role_basic->description = 'A basic user';
        $role_basic->save( );
    }
}
