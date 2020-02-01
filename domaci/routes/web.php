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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function() {
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

Route::post('/students', function(Request $request) {
    $name = $request->input('name');
    $family_name = $request->input('family_name');
    $birthday = $request->input('birthday');
});

Route::patch('/students/{id}', function(Request $request, $id) {
    $name = $request->input('name');
    $family_name = $request->input('family_name');
    $birthday = $request->input('birthday');
});

Route::delete('/students/{id}', function($id) {
    return "Student ciji id je $id je obrisan";
});
