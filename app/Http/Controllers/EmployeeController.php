<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return redirect('/test');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
