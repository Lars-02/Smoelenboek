<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index');
    Route::post('/', [UserController::class, 'registerNewUser'])->name('registerNewUser');

    Route::get('/profile/{username}', [ProfileController::class, 'user'])->name('profile');

    Route::resource('employee', EmployeeController::class);

    //Add a redirect to the main page with an error.
    Route::fallback(function () {
        return redirect()->route('home');
    });


});
