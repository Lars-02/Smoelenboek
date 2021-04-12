<?php

namespace App\Http\Controllers;

use App\Models\Employee;

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
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!isset(auth()->user()->employee))
            abort(500);
        $employee = auth()->user()->employee;
        if (is_null($employee->firstname)
            || is_null($employee->lastname)
            || is_null($employee->phoneNumber)
            || is_null($employee->department)) {
            return redirect()->route('employee.create');
        }

        $employees = Employee::all();
        return view('home', compact(["employees"]));
    }
}
