<?php

use Illuminate\Database\Seeder;

class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('app_settings') ->insert([
            'name' => 'RMS API Key',
            'description' => 'Key used to interogate the research management system',
            'setting_value' => 'none',
            'hidden_from_gui' => false,
            'display_order' => 2,
            ]);
        DB::table('app_settings') ->insert([
            'name' => 'Application Site Name',
            'description' => 'Name of the application instance.',
            'setting_value' => 'Research Funding Portal',
            'hidden_from_gui' => false,
            'display_order' => 1,
            ]);
    }
}
