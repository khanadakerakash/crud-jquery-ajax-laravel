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


Route::get('student', 'StudentController@index');
Route::post('student', 'StudentController@add');
Route::get('student/view', 'StudentController@view');
Route::post('student/update', 'StudentController@update');
Route::post('student/delete', 'StudentController@delete');