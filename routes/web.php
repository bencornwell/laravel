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
    return view('welcome');
});

Route::any('/home', 'DashboardController@index' );
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get( 'auth/logout', 'Auth\LoginController@logout');
Route::get( 'logout', 'Auth\LoginController@logout');


Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('/tasks', 'TaskController@index' );
Route::post('/task','TaskController@store' );
Route::delete('/task/{task}', 'TaskController@destroy' );
Route::auth();
