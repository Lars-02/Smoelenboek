<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable|RedirectResponse
     */
    public function index()
    {
        if (!isset(auth()->user()->employee))
            abort(500);
        $employee = auth()->user()->employee;
        if (is_null($employee->firstname)
            || is_null($employee->lastname)
            || is_null($employee->phoneNumber)
            || is_null($employee->department)) {
            return redirect()->route('employee.create');
        }
        $learningLines = LearningLine::all();
        $departments = Department::all();
        $employees = Employee::all();
        return view('home', compact(["employees", "learningLines", "departments"]));
    }

    public static function filterLearningLine($option)
    {
        $option = LearningLine::where('name', $option)->first();
        $learningLines = EmployeeLearningLine::all();
        $employees = [];

        foreach($learningLines as $learningLine)
        {
            if($learningLine->learning_line_id == $option->id)
            {
                $employee = Employee::find($learningLine->employee_id);
                array_push($employees, $employee);
            }
        }
        return $employees;
    }

    public static function filterDepartment($option)
    {
        $department = Department::where('name', $option)->first();
        $employees = Employee::where('department', $department->name)->get();
        return $employees;
    }
}
