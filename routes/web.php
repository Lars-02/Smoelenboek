<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employee/form', function () {
    $departments = Department::All();
    $roles = Role::All();
    $expertises = Expertise::all();
    return view('employee.form', compact('departments', 'roles', 'expertises'));
});
