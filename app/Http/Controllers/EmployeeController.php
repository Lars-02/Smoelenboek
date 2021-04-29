<?php

namespace App\Http\Controllers;

use App\Models\DayOfWeek;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
use App\Models\WorkHour;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $departments = Department::all()->pluck('name');
        $roles = Role::all()->pluck('name', 'id');
        $expertises = Expertise::all()->pluck('name', 'id');

        return view('employee.form', compact('departments', 'roles', 'expertises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'department' => 'required',
            'expertise' => 'required',
            'phoneNumber' => 'required',
            'role' => 'required',
        ]);

        $user = auth()->user();

        try {
            //Loop to pick day from array
            for ($i = 0; $i < 5; $i++) {
                $days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday');
                if (!empty(request($days[$i]))) {
                    //Loop to add each work hour entry
                    foreach (request($days[$i]) as $parent) {
                        if (!empty($parent["start_time"]) && !empty($parent["end_time"])) {
                            $workinghours = new WorkHour;
                            $workinghours->day = DayOfWeek::where('day', $days[$i])->first()->id;
                            $workinghours->employee_id = $user->employee->id;
                            $workinghours->start_time = $parent["start_time"];
                            $workinghours->end_time = $parent["end_time"];
                            $workinghours->save();
                        }
                    }
                }
            }
        } catch(Exception $error) {
            $request->session()->flash('dbError', $error->getMessage());
            return redirect()->route('employee.create');
        }

        $user->roles()->sync(request('role'));

        $userName = explode('@', $user->email);
        $user->employee->username = $userName[0];
        $user->employee->update($request->only(['username','firstname', 'lastname', 'phoneNumber', 'department']));
        $user->employee->expertises()->sync(request('expertise'));

        $request->session()->flash('succes', 'Your data has been stored succesfully.');

        //Redirect to dashboard maybe?
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function show(Employee $employee)
    {
        return view('employee.profile', compact(["employee"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all()->pluck('name');
        $days_of_week = DayOfWeek::all();
        return view('employee.editProfile', compact(["employee"], 'departments', 'days_of_week'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employee $employee
     * @return Response
     */
    public function update(Request $request, Employee $employee)
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
        ]);

        $employee->update($request->only(['firstname', 'lastname', 'phoneNumber']));
        $employee->user()->update($request->only(['email']));

        return view('employee.profile', compact(["employee"]))->with('succes', 'Je gegevens zijn veranderd.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return Response
     */
    public function destroy(Employee $employee)
    {
        return abort(404);
    }
}
