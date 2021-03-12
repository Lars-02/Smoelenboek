<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Expression;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
            'expertise' => 'required',
            'job' => 'required',
        ]);

        $user = User::where('email', request('email'))->firstOrFail();
        $user->roles()->attach(request('job'));

        $user->employee->username = request('username');
        $user->employee->firstname = request('firstname');
        $user->employee->lastname = request('lastname');
        $user->employee->department = request('department');
        $user->employee->save();
        $user->employee->expertises()->attach(request('expertise'));

        //Redirect to dashboard maybe?
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return dump($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        return abort(404);
    }
}
