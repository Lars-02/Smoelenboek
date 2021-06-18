<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequests\EditEmployeeRequest;
use App\Http\Requests\EmployeeRequests\StoreEmployeeRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkDay;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        $roles = Role::where('self_assignable', true)->pluck('name', 'id');
        $expertises = Expertise::all()->pluck('name', 'id');
        $workDays = WorkDay::all();

        return view('employee.create', compact(['user', 'departments', 'roles', 'expertises', 'workDays']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        $employee = Employee::create($validated);

        $employee->departments()->sync($validated['departments']);
        $employee->expertises()->sync($validated['expertises']);
        $employee->workDays()->sync($validated['workDays']);
        $employee->save();

        $employee->user->roles()->sync([$employee->user->roles(), $validated['roles']]);
        $employee->user->save();

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @param null $succes
     * @return Application|Factory|View|Response
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
     * @return Application|Factory|View|Response
     */
    public function edit(Employee $employee)
    {
        $workDays = WorkDay::all();
        $departments = Department::all()->pluck('name', 'id');
        $hobbies = Hobby::all()->pluck('name', 'id');
        $courses = Course::all()->pluck('name', 'id');
        $lectorates = Lectorate::all()->pluck('name', 'id');
        $expertises = Expertise::all()->pluck('name', 'id');
        $learningLines = LearningLine::all()->pluck('name', 'id');
        $minors = Minor::all()->pluck('name', 'id');

        if(Auth::user()->isAdmin()) {
            $roles = Role::all()->pluck('name', 'id');
        }else{
            $roles = Role::where('self_assignable', true)->pluck('name', 'id');
        }

        return view('employee.edit', compact('employee', 'departments', 'hobbies', 'courses', 'workDays', 'lectorates', 'expertises', 'learningLines', 'minors', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param EditEmployeeRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EditEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        // updateOrDelete only applies to nullable attributes
        $employee->update(request(['firstname', 'lastname', 'phoneNumber', 'expertise', 'linkedInUrl']));
        $employee->user->update(['email' => $validated['email']]);
        if (!empty($request->file('photoUrl'))) {
            $employee->user->update(['photoUrl' => $request->file('photoUrl')->store('photos')]);
        }
        $employee->user->roles()->sync($validated['roles']);
        $employee->workDays()->sync($validated['workDays']);
        $employee->departments()->sync($validated['departments']);
        $this->updateOrDelete($employee->lectorates(), 'lectorates', $validated);
        $this->updateOrDelete($employee->hobbies(), 'hobbies', $validated);
        $this->updateOrDelete($employee->learningLines(), 'learningLines', $validated);
        $this->updateOrDelete($employee->courses(), 'courses', $validated);
        $this->updateOrDelete($employee->minors(), 'minors', $validated);
        $this->updateOrDelete($employee->expertises(), 'expertises', $validated);
        $employee->save();

        return redirect()->action([EmployeeController::class, 'show'], ['employee' => $employee, 'succes' => "Alle gegevens zijn succesvol opgeslagen"]);

    }

    public function updateOrDelete($employeeAttribute, $attributeName, $validated)
    {
        if (empty($validated[$attributeName])) {
            $employeeAttribute->detach();
        } else {
            $employeeAttribute->sync($validated[$attributeName]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return Response|void
     */
    public function destroy(Employee $employee)
    {
        if($employee->user_id == Auth::id()) 
        {
            $route = 'login';
            Auth::logout(); 
        }
        else{
            $route = 'home';
        }
        $employee->delete();
        User::find($employee->user_id)->delete();
        return redirect()->route($route)->with('success', 'Het account is succesvol verwijderd!');
    }
}
