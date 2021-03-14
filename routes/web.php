<?php

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

Route::get('/employee/registerFirst', function () {
    $array = array('1', '2');
    return view('employee.registerFirst', compact('array'));
});

Route::get('/employee/registerSecond', function () {
    $afdeling = array('AB&I', 'AII', 'AKD');
    $functie = array('Docent', 'Directeur', 'Conciërge');
    $expertise = array('Big Data Management', 'Data Analyst', 'Consultancy');
    return view('employee.registerSecond', compact('afdeling', 'functie', 'expertise'));
});

Route::get('/employee/registerThird', function () {
    $array = array('1', '2');
    return view('employee.registerThird', compact('array'));
});
