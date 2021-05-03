<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\DayOfWeek;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
use App\Models\WorkHour;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $roles = Role::all()->whereNotIn('id', 1)->pluck('name', 'id');
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
    public function show(Employee $employee, $succes = null)
    {
        return view('employee.profile', compact(["employee"]))->with('succes', $succes);
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
        $hobbies = Hobby::all();
        $courses = Course::all();
        $lectorates = Lectorate::all();
        $expertises = Expertise::all();
        $learningLines = LearningLine::all();
        $minors = Minor::all();
        $roles = Role::all()->whereNotIn('id', 1);

        if ($employee->id == Auth::user()->id || Auth::user()->isAdmin()) {
            return view('employee.profile_edit', compact(["employee"], 'departments', 'days_of_week', 'hobbies', 'courses', 'lectorates', 'expertises', 'learningLines', 'minors', 'roles'));
        }
        else {
            return $this->show($employee, $succes = "U heeft geen toegang tot het bewerken van andermans profielen.");
        }
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
            'firstname' => 'required|alpha|min:2|max:60',
            'lastname' => 'required|alpha|min:2|max:60',
            'phoneNumber' => ['required', 'regex:/^+(9[976]\d|8[987530]\d|6[987]\d|5[90]\d|42\d|3[875]\d|2[98654321]\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\d{1,14}$/i'],
            'email' => 'required|email',
            'department' => 'required',
        ]);



        $employee->update(request(['firstname', 'lastname', 'phoneNumber', 'department', 'expertise', 'role', 'linkedInUrl']));
        $employee->user()->roles()->sync(request('roles'));
        $employee->user()->update(request('email'));

        $employee->lectorate()->sync(request('lectorates'));
        $employee->hobby()->sync(request('hobbies'));
        $employee->learningLine()->sync(request('learningLines'));
        $employee->course()->sync(request('courses'));
        $employee->minor()->sync(request('minors'));
        $employee->expertises()->sync(request('expertises'));
        $employee->save();

        return $this->show($employee, $succes = "Alle gegevens zijn succesvol opgeslagen");
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
