<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Filters\RoleFilter;
use App\Filters\WorkDayFilter;
use App\Filters\LearningLineFilter;
use App\Filters\DepartmentFilter;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
use App\Models\WorkDay;
use Illuminate\Contracts\Support\Renderable;
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
        $employees = Employee::all();

        if (isset($request['courses'])) {
            $courseFilter = new CourseFilter();
            $employees = $courseFilter->filter($employees, $request['courses']);
        }

        if (isset($request['roles'])) {
            $functionFilter = new RoleFilter();
            $employees = $functionFilter->filter($employees, $request['roles']);
        }

        if (isset($request['workDays'])) {
            $workDayFilter = new WorkDayFilter();
            $employees = $workDayFilter->filter($employees, $request['workDays']);
        }

        if (isset($request['learningLines'])) {
            $learningLineFilter = new LearningLineFilter();
            $employees = $learningLineFilter->filter($employees, $request['learningLines']);
        }

        if (isset($request['departments'])) {
            $departmentFilter = new DepartmentFilter();
            $employees = $departmentFilter->filter($employees, $request['departments']);
        }

        $courses = Course::all();
        $departments = Department::all();
        $expertises = Expertise::all();
        $hobbies = Hobby::all();
        $learningLines = LearningLine::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $roles = Role::all();
        $workDays = WorkDay::all();

        return view('home', compact(["request", "employees", "courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles", "workDays"]));
    }
}
