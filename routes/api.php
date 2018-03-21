<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('locations', 'LocationController@index');

Route::get('location/{id}', 'LocationController@show');

Route::post('location', 'LocationController@store');

Route::put('location', 'LocationController@store');

Route::delete('location/{id}', 'LocationController@destroy');

Route::get('users', 'UserController@index');

Route::get('user/{id}', 'UserController@show');

Route::post('user', 'UserController@store');

Route::put('user', 'UserController@store');

Route::delete('user/{id}', 'UserController@destroy');

Route::get('clients', 'ClientController@index');

Route::get('client/{id}', 'ClientController@show');

Route::post('client', 'ClientController@store');

Route::put('client', 'ClientController@store');

Route::delete('client/{id}', 'ClientController@destroy');
