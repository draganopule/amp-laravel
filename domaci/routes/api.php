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

Route::get('/hotels', 'Api\HotelsController@index');

Route::get('/hotels/{hotel}', 'Api\HotelsController@show');

Route::post('/hotels', 'Api\HotelsController@store');

Route::patch('/hotels/{hotel}', 'Api\HotelsController@update');

Route::delete('/hotels/{hotel}', 'Api\HotelsController@destroy');
