<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubFilterController;
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
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('register', [RegisterController::class, 'create'])->name('register.create');
        Route::post('register', [RegisterController::class, 'store'])->name('register.store');

        Route::group(['middleware' => 'employee.edit', 'prefix' => 'employee', 'as' => 'employee.'], function () {

            Route::get('{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
        });
        Route::put('{employee}', [EmployeeController::class, 'update'])->name('employee.update');

        Route::get('employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::delete('employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');

        Route::resource('subfilter', SubFilterController::class);
        Route::delete('subfilter/destroy/{id}', [SubFilterController::class, 'destroy'])->name('subfilter.destroy');
        Route::post('subfilter/create/{filter}', [SubFilterController::class, 'create'])->name('createsubfilter');
        Route::post('subfilter/edit/{filter}/{id}', [SubFilterController::class, 'edit'])->name('editsubfilter');
    });

});

Route::fallback(function () {
    return redirect()->route('home');
});
