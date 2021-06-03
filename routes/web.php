<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'employee.empty', 'prefix' => 'employee', 'as' => 'employee.'], function () {
        Route::get('/create', [EmployeeController::class, 'create'])->name('create');
        Route::post('/', [EmployeeController::class, 'store'])->name('store');
    });

    Route::group(['middleware' => 'employee'], function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('register', [RegisterController::class, 'create'])->name('register.create');
        Route::post('register', [RegisterController::class, 'store'])->name('register.store');

        Route::group(['middleware' => 'employee.edit', 'prefix' => 'employee', 'as' => 'employee.'], function () {
            Route::get('{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
            Route::post('/', [EmployeeController::class, 'update'])->name('update');
        });

        Route::get('employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
    });

});

Route::fallback(function () {
    return redirect()->route('home');
});
