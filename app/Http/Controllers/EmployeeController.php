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
        $user = Auth::user();
        $departments = Department::all()->pluck('name', 'id');
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
            'lastname' => 'required|min:2|max:40',
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
        $allDays = WorkDay::all()->pluck('name');
        $workingDays = $employee->workDays->map(function ($item) {
            return $item->name;
        })->toArray();

        return view('employee.profile', compact(["employee"], 'allDays', 'workingDays'))->with('succes', $succes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $workDays = WorkDay::all();
        $hobbies = Hobby::all();
        $courses = Course::all();
        $lectorates = Lectorate::all();
        $expertises = Expertise::all();
        $learningLines = LearningLine::all();
        $minors = Minor::all();
        $roles = Role::all()->whereNotIn('id', 1);

        if ($employee->id == Auth::user()->id || Auth::user()->isAdmin()) {
            return view('employee.profile_edit', compact(["employee"], 'departments', 'hobbies', 'courses', 'workDays', 'lectorates', 'expertises', 'learningLines', 'minors', 'roles'));
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
            'lastname' => 'required|min:2|max:60',
            'phoneNumber' => ['required'],
            'email' => 'required|email',
            'departments' => 'required',
        ]);

        if ($employee->id == Auth::user()->id || Auth::user()->isAdmin()) {
            $employee->update(request(['firstname', 'lastname', 'phoneNumber', 'expertise', 'linkedInUrl']));
            $employee->user()->update($request->only(['email']));

//            $employee->user()->roles()->sync(request('roles'));
            $employee->user->roles()->sync(request('roles'));

            $employee->workDays()->sync(request('workDays'));
            $employee->departments()->sync(request('departments'));
            $employee->lectorates()->sync(request('lectorates'));
            $employee->hobbies()->sync(request('hobbies'));
            $employee->learningLines()->sync(request('learningLines'));
            $employee->courses()->sync(request('courses'));
            $employee->minors()->sync(request('minors'));
            $employee->expertises()->sync(request('expertises'));
            $employee->save();

            return redirect()->action([EmployeeController::class, 'show'], ['employee' => $employee, 'succes' => "Alle gegevens zijn succesvol opgeslagen"]);
        }
        else {
            return redirect()->action([EmployeeController::class, 'show'], ['employee' => $employee, 'succes' => "U heeft geen toegang tot het bewerken van andermans profielen."]);
        }
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
