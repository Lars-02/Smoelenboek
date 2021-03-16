<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Department;
use App\Models\Expertise;
use App\Models\Role;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {

    $departments = Department::all();
    $roles = Role::all();
    $expertises = Expertise::all();
    return view('welcome', compact('departments', 'roles', 'expertises'));
});

Auth::routes();

//Registration
Route::resource('employee', EmployeeController::class)->only(['create', 'store']);

//Add a redirect to the main page with an error.
Route::fallback(function () {
    return view('welcome');
});
