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

Route::get('/add-student','StudentController@index');
Route::post('/save-student','StudentController@save_student');
Route::get('/all-student','StudentController@all_student');
Route::get('/edit-student/{student_id}','StudentController@edit_student');
Route::post('/update-student/{edit_id}','StudentController@update_student');
Route::get('/delete-student/{delete_id}','StudentController@delete_student');
Route::post('/import_data','StudentController@import_data');
Route::get('/downloadExcel/{type}', 'StudentController@downloadExcel');
