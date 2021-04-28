<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLearningLine;
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

        $employees = Employee::all();
        return view('home', compact(["employees"]));
    }

    public function filterLearningLine($option)
    {
        $option = 1;
        $learningLines = EmployeeLearningLine::all();
        $employees = [];
        foreach($learningLines as $learningLine)
        {
            if($learningLine->learning_line_id == $option)
            {
                $employee = Employee::find($learningLine->employee_id);
                array_push($employees, $employee);
            }
        }
        return $employees;
    }

    public function filterDepartment($option)
    {
        $option = 'AI&I';
        $employees = Employee::where('department', $option)->get();
        return $employees;
    }
}
