<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = auth()->user()->employee;
        if(is_null($employee->firstname)
            && is_null($employee->lastname)
            && is_null($employee->phoneNumber)
            && is_null($employee->department)) {
            return redirect()->route('employee.create');
        }

        return view('home');
    }
}
