<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->insert([
            'status_name' => 'Successful'
        ]);
        DB::table('statuses')->insert([
            'status_name' => 'Pending'
        ]);
        DB::table('statuses')->insert([
            'status_name' => 'New'
        ]);
    }
}
