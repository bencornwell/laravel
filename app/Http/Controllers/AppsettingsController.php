<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AppSetting;
use Session;
use \Illuminate\Contracts\Cache\Factory;
class AppsettingsController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');

    }
    //
    //
    public function index(Request $request)
    {
        if( !Auth::user( )->isAdmin( ) )
        {
            return redirect( '/home' );
        }

        $appSettings = AppSetting::where( 'hidden_from_gui', false )->orderBy('display_order','asc' )->get( );

        return view('appsettings.index', ['appsettings' => $appSettings] );
    }

    public function store( Request $request, Factory $cache )
    {

        foreach( $request->input('app-setting' ) as $setting => $value )
        {
            $appSetting = AppSetting::find( $setting );
            $appSetting->setting_value = $value;
            $appSetting->save( );

        }
        $cache->forget('appsettings' );
        Session::flash('message', 'Settings have been saved.'); 
        Session::flash('alert-class', 'alert-info'); 
        return redirect('appsettings' );
    }
}
