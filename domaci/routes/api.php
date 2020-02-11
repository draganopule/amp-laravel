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

Route::middleware('PasswordFilter:api')->get('/students', function() {
    $students = [
        [
            'name' => 'Dragan',
            'family_name' => 'Jovanovic',
            'birthday' => '03.01.1998',
            'years_of_study' => 4,
            'average_grade' => 9.5,
        ],
        [
            'name' => 'Snezana',
            'family_name' => 'Kokic',
            'birthday' => '03.01.1995',
            'years_of_study' => 3,
            'average_grade' => 8.5,
        ],
        [
            'name' => 'Marko',
            'family_name' => 'Radojevic',
            'birthday' => '03.01.1999',
            'years_of_study' => 3,
            'average_grade' => 7.2,
        ],
        
    ];
    return $students;
});

Route::middleware('PasswordFilter')->post('/students', function(Request $request) {
    $name = $request->input('name');
    $family_name = $request->input('family_name');
    $birthday = $request->input('birthday');
    $student = [
        'name' => $name,
        'family_name' => $family_name,
        'birthday' => $birthday,
    ];
    return $student;
});

Route::middleware('PasswordFilter')->patch('/students/{id}', function(Request $request, $id) {
    $name = $request->input('name');
    $family_name = $request->input('family_name');
    $birthday = $request->input('birthday');
    $student = [
        'id' => $id,
        'name' => $name,
        'family_name' => $family_name,
        'birthday' => $birthday,
    ];
    return $student;
});

Route::middleware('PasswordFilter')->delete('/students/{id}', function($id) {
    return "Student ciji id je $id je obrisan";
});

// Route::get('/hotels', 'Api\HotelsController@index');
// Route::get('/hotels/{hotel}', 'Api\HotelsController@show');
// Route::post('/hotels', 'Api\HotelsController@store');
// Route::patch('/hotels/{hotel}', 'Api\HotelsController@update');
// Route::delete('/hotels/{hotel}', 'Api\HotelsController@destroy');

Route::get('/hotels/{hotel}/rooms/search', 'Api\SearchRoomsController@search');
Route::apiResource('/hotels/{hotel}/room-types','Api\RoomTypesController');
Route::apiResource('/hotels/{hotel}/rooms','Api\RoomsController');
Route::apiResource('/hotels','Api\HotelsController');
Route::apiResource('/countries','Api\CountriesController');
