<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkHour;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select("department")->pluck("department");
        $roles = Role::all()->pluck("name");
        $expertises = Expertise::all()->pluck("name");

        return view('employee.form', compact('departments', 'roles', 'expertises'));
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
            'email' => 'required|regex:/^.+@.+$/i',
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
            'expertise' => 'required',
            'telephone' => 'required|numeric',
            'role' => 'required',
        ]);

        $user = User::where('email', request('email'))->firstOrFail();
        $user->role()->sync(request('role'));

        $user->employee->firstname = request('firstname');
        $user->employee->lastname = request('lastname');
        $user->employee->phoneNumber = request('telephone');
        $user->employee->department = request('department');
        $user->employee->save();
        $user->employee->expertise()->sync(request('expertise'));

        //Loop to pick day from array
        for($i = 0; $i < 5; $i++) {
            $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
            if(! empty(request($days[$i]))) {
                //Loop to add each work hour entry
                foreach (request($days[$i]) as $parent) {
                    if (!empty($parent["start_time"]) && !empty($parent["end_time"])) {
                        $workinghours = new WorkHour;
                        $workinghours->day = ucfirst($days[$i]);
                        $workinghours->employee_id = $user->employee->id;
                        $workinghours->start_time = $parent["start_time"];
                        $workinghours->end_time = $parent["end_time"];
                        $workinghours->save();
                    }
                }
            }
        }

        $request->session()->flash('succes', 'Your data has been stored succesfully.');

        //Redirect to dashboard maybe?
        return redirect('/home');
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
