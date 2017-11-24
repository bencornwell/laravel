<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_basic = Role::where('name', 'user' )->first( );
        $role_admin = Role::where('name', 'administrator' )->first( );

        $basic = new User;
        $basic->name = 'Ben Cornwell';
        $basic->email = 'benco@bencornwell.com';
        $basic->password = bcrypt('something');
        $basic->save();
        $basic->roles()->attach($role_basic);


        $admin= new User;
        $admin->name = 'Ben Admin Cornwell';
        $admin->email = 'ben@bencornwell.com';
        $admin->password = bcrypt('testing');
        $admin->save();
        $admin->roles()->attach($role_basic);
        $admin->roles()->attach($role_admin);
    }
}
