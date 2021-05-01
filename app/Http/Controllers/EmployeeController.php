<?php

namespace App\Http\Controllers;

use App\Models\DayOfWeek;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
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
        $departments = Department::all()->pluck('name');
        $roles = Role::all()->pluck('name', 'id');
        $expertises = Expertise::all()->pluck('name', 'id');
        $dayOfWeek = DayOfWeek::all()->take(5);

        return view('employee.create', compact(['user', 'departments', 'roles', 'expertises', 'dayOfWeek']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store()
    {
        Employee::create(
            $this->validateEmployee()
        );

        return redirect(route('home'));
    }

    protected function validateEmployee()
    {
        return request()->validate([
            'user_id' => 'required|unique:employee',
            'firstname' => 'required|alpha|min:2|max:40',
            'lastname' => 'required|alpha|min:2|max:40',
            'phoneNumber' => 'required|max:15',
        ]);
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
        return abort(404);
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
        return abort(404);
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
