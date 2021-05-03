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
use App\Models\WorkDay;
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
        $workDays = WorkDay::all();

        return view('employee.create', compact(['user', 'departments', 'roles', 'expertises', 'workDays']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = $this->validateEmployee();

        $employee = Employee::create($validated);

        $employee->departments()->sync($validated['departments']);
        $employee->expertises()->sync($validated['expertises']);
        $employee->workDays()->sync($validated['workDays']);
        $employee->save();

        $employee->user->roles()->sync($validated['roles']);
        $employee->user->save();

        return redirect(route('home'));
    }

    protected function validateEmployee()
    {
        return request()->validate([
            'user_id' => 'required|unique:employee',
            'firstname' => 'required|alpha|min:2|max:40',
            'lastname' => 'required|alpha|min:2|max:40',
            'phoneNumber' => 'required|max:15',
            'departments' => 'required|exists:department,id',
            'expertises' => 'required|exists:expertise,id',
            'roles' => 'required|exists:role,id',
            'workDays' => 'required|exists:work_day,id',
        ]);
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
        $minors =  Minor::all();
        $roles = Role::all()->whereNotIn('id', 1);

        return view('employee.profile_edit', compact(["employee"], 'departments', 'days_of_week', 'hobbies', 'courses', 'lectorates', 'expertises', 'learningLines', 'minors', 'roles'));
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
