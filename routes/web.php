<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\http\controllers\EmployeeController;
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

    Route::resource('employee', EmployeeController::class)->only(['create', 'store']);

    //Add a redirect to the main page with an error.
    Route::fallback(function () {
        return redirect()->route('home');
    });
});


