<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequests\CreateEmployeeRequest;
use App\Http\Requests\EmployeeRequests\EditEmployeeRequest;
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
    public function update(EditEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        
        if ($employee->id == Auth::user()->id || Auth::user()->isAdmin()) {
            $employee->update(request(['firstname', 'lastname', 'phoneNumber', 'expertise', 'linkedInUrl']));
            $employee->user()->update($validated['email']);
            $employee->user->roles()->sync($validated['roles']);

            $employee->workDays()->sync($validated['workDays']);
            $employee->departments()->sync($validated['departments']);
            $employee->lectorates()->sync($validated['lectorates']);
            $employee->hobbies()->sync($validated['hobbies']);
            $employee->learningLines()->sync($validated['learningLines']);
            $employee->courses()->sync($validated['courses']);
            $employee->minors()->sync($validated['minors']);
            $employee->expertises()->sync($validated['expertises']);
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
