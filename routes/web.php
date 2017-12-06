<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('splash');
});

Route::any('/home', 'DashboardController@index' );
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get( 'auth/logout', 'Auth\LoginController@logout');
Route::get( 'logout', 'Auth\LoginController@logout');


Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

Route::get( 'admin_area', ['middleware' => 'admin', function( ) {
    Route::any('/appsettings', 'AppsettingsController@index' );
    Route::post('/appsettings', 'AppsettingsController@store' );
}]);
 
Route::any('/appsettings', 'AppsettingsController@index' );
Route::post('/appsettings', 'AppsettingsController@store' );

Route::get('/grants', 'GrantController@index' );
Route::get('/grant/create', 'GrantController@create' );
Route::post('/grant/create', [ 'as' => 'grant.create', 'uses' => 'GrantController@store' ] );
Route::get('/grant/edit/{grant}', 'GrantController@edit' );
Route::post('/grant/edit/{grant}', [ 'as' => 'grant.edit', 'uses' => 'GrantController@update' ] );

Route::get('/organisations/modal', [ 'as' => 'organisations.modal','uses' => 'OrganisationController@indexModal' ] );
Route::get('/organisations', 'OrganisationController@index' );
Route::get('/organisation/{organisation}', 'OrganisationController@show' );

Route::get('/fundinground/modal', [ 'as' => 'fundinground.modal','uses' => 'FundingRoundController@indexModal' ] );
Route::get('/fundinground/{fundinground}', 'FundingRoundController@show' );

Route::get('/tasks', 'TaskController@index' );
Route::post('/task','TaskController@store' );
Route::delete('/task/{task}', 'TaskController@destroy' );
Route::auth();
