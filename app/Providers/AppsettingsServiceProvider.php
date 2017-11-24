<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Illuminate\Contracts\Cache\Factory;
use App\AppSetting;
class AppsettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Factory $cache, AppSetting $appSetting )
    {
        $appSetting = $cache->remember( 'appsettings', 60, function( ) use ($appSetting)
        {
            return $appSetting->pluck( 'setting_value', 'name')->all( );
        });
        config( )->set( 'appsettings', $appSetting );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
