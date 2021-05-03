<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureEmptyEmployee;
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

    Route::resource('employee', EmployeeController::class);

        Route::get('/', [HomeController::class, 'index'])->name('home');

        // TODO: Simplify these routes.
        Route::get('/register', [RegisterController::class, 'index']);
        Route::post('/', [UserController::class, 'registerNewUser'])->name('registerNewUser');

        Route::resource('employee', EmployeeController::class)
            ->only(['show']);
    });
});

Route::fallback(function () {
    return redirect()->route('home');
});
