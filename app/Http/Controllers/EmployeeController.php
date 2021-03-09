<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
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
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
            'expertise' => 'required',
            'job' => 'required',
        ]);

        dd();

        $employee = new Employee();
        $employee->username = request('username');
        $employee->firstname = request('firstname');
        $employee->lastname = request('lastname');
        $employee->department = request('department');
        $employee->save();

        $expertise = Expertise::where('id', request('expertise'));
        $employee->expertise()->save($expertise->id);

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
        dump($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        abort(404);
    }
}
