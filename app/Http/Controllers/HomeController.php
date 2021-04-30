<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Filters\FunctionFilter;
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
use App\Models\EmployeeLearningLine;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        if (!isset(auth()->user()->employee))
            abort(500);
        $employee = auth()->user()->employee;
        if (!isset($employee->firstname)
            || !isset($employee->lastname)
            || !isset($employee->phoneNumber)
            || !isset($employee->department)) {
            return redirect()->route('employee.create');
        }
        $learningLines = LearningLine::all();
        $departments = Department::all();
        $employees = Employee::all();

        if (isset($request['courses'])) {
            $courseFilter = new CourseFilter();
            $employees = $courseFilter->filter($employees, $request['courses']);
        }

        if (isset($request['roles'])) {
            $functionFilter = new FunctionFilter();
            $employees = $functionFilter->filter($employees, $request['roles']);
        }

        $courses = Course::all();
        $departments = Department::all();
        $expertises = Expertise::all();
        $hobbies = Hobby::all();
        $learningLines = LearningLine::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $roles = Role::all();

        return view('home', compact(["request", "employees", "courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles"]));
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
