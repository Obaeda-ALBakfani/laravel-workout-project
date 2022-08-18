<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\InjuryController;
use Illuminate\Support\Facades\Auth;





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

//PUBLIC ROUTES
###################  USER ROUTES   ###########
Route::post('register',[ UserController::class,'register'])->name('register');
Route::post('login', [UserController::class,'login'])->name('login');



#########   EXE ROUTES  ##########
Route::get('all_exe', [ExerciseController::class,'all_exe'])->name('all_exe');
Route::get('show_exe/{id}', [ExerciseController::class,'show_exe'])->name('show_exe');



#########   TRAINEE ROUTES  #########
Route::get('all_trainee', [TraineeController::class,'all_trainee'])->name('all_trainee');
Route::get('show_trainee/{id}', [TraineeController::class,'show_trainee'])->name('show_trainee');



/*______________________________________________________________________*/


//PROTECTED ROUTES 
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('logout', [UserController::class,'logout'])->name('logout');
    Route::post('update_identity/{id}', [UserController::class,'update_identity'])->name('update_identity');
//  Route::put('makeadmin/{id}', [UserController::class,'makeadmin'])->name('makeadmin');
    Route::get('all_users', [UserController::class,'all_users'])->name('all_users');
    Route::get('all_admins', [UserController::class,'all_admins'])->name('all_admins');


    //#######   ADMIN   #########
    Route::get('test',[AdminController::class,'test'])->middleware(['admin']);
    Route::post('add_exe',[AdminController::class,'add_exe'])->middleware(['admin']);
    Route::delete('destroy_exe/{id}',[AdminController::class,'destroy_exe'])->middleware(['admin']);
    Route::put('update_exe/{id}',[AdminController::class,'update_exe'])->middleware(['admin']);
    Route::post('relate_exe_ill/{id}/{id1}',[AdminController::class,'exe_illness'])->middleware(['admin']);
    Route::post('add_injury',[AdminController::class,'add_injury'])->middleware(['admin']);
    Route::put('update_injury/{id}',[AdminController::class,'update_injury'])->middleware(['admin']);
    Route::delete('destroy_injury/{id}',[AdminController::class,'destroy_injury'])->middleware(['admin']);
    Route::post('create_diet',[AdminController::class,'create_diet'])->middleware(['admin']);
    Route::put('update_diet/{id}',[AdminController::class,'update_diet'])->middleware(['admin']);
    Route::put('destroy_diet/{id}',[AdminController::class,'destroy_diet'])->middleware(['admin']);
    Route::post('add_song',[AdminController::class,'add_song'])->middleware(['admin']);
    Route::delete('delete_song/{id}',[AdminController::class,'delete_song'])->middleware(['admin']);
    Route::put('update_song/{id}',[AdminController::class,'update_song'])->middleware(['admin']);

    
    #########  MUSIC   #########  
    Route::get('all_music', [ExerciseController::class,'all_music'])->name('all_music');
    Route::get('show_music/{id}', [ExerciseController::class,'show_music'])->name('show_music');

    #########  make admin  ########
    Route::post('make_admin',[AdminController::class,'make_admin'])->middleware(['admin']);
    Route::post('make_new_admin',[AdminController::class,'make_new_admin'])->middleware(['admin']);


    #########  TRAINEE  #########
    Route::post('create_trainee', [TraineeController::class,'create_trainee'])->middleware(['trainee']);
    Route::post('update_Trainee/{id}', [TraineeController::class,'update_Trainee'])->middleware(['trainee']);
    Route::post('choose_injury/{id}/{id1}', [TraineeController::class,'choose_injury'])->middleware(['trainee']);
    Route::post('suggesting_exe/{id}', [TraineeController::class,'suggesting_exe'])->middleware(['trainee']);



    ######### EXERCISE ############




    ######### INJURY  #############
    Route::get('all_injuries', [InjuryController::class,'all_injuries'])->name('all_injuries');
    Route::get('show_injury/{id}', [InjuryController::class,'show_injury'])->name('show_injury');


    ######### DIETS   #############
    Route::get('all_diets', [ExerciseController::class,'all_diets'])->name('all_diets');
    Route::get('show_diet/{id}', [ExerciseController::class,'show_diet'])->name('show_diet');

});
