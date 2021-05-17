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
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
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

        return view('employee.show', compact(["employee"], 'allDays', 'workingDays'))->with('succes', $succes);
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
            return view('employee.edit', compact(["employee"], 'departments', 'hobbies', 'courses', 'workDays', 'lectorates', 'expertises', 'learningLines', 'minors', 'roles'));
        }
        else {
            return back()->with('error', 'U heeft geen toegang tot het bewerken van andermans profielen.');
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
            'phoneNumber' => array('required', 'regex:/^((\+31)|(0031)|0)(\(0\)|)(\d{1,3})(\s|\-|)(\d{8}|\d{4}\s\d{4}|\d{2}\s\d{2}\s\d{2}\s\d{2})$/'),
            'email' => 'required|email',
            'departments' => 'required',
        ]);

        if ($employee->id == Auth::user()->id || Auth::user()->isAdmin()) {
            $employee->update(request(['firstname', 'lastname', 'phoneNumber', 'expertise', 'linkedInUrl']));
            $employee->user()->update($request->only(['email']));
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
