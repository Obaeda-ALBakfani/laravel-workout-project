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


Route::resource('user', 'UserController');
Route::resource('injury', 'InjuryController');
Route::resource('exercise', 'ExerciseController');
Route::resource('trainee_ill', 'Trainee_illController');
Route::resource('trainee', 'TraineeController');
Route::resource('trainee_exe', 'Trainee_exeController');
Route::resource('exe_ill', 'Exe_illController');
