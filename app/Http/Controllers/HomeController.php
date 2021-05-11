<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Filters\RoleFilter;
use App\Filters\WorkDayFilter;
use App\Filters\LearningLineFilter;
use App\Filters\DepartmentFilter;
use App\Filters\ExpertiseFilter;
use App\Filters\HobbyFilter;
use App\Filters\LectorateFilter;
use App\Filters\MinorFilter;
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
use App\Models\SearchBar;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

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
        if(!isset($employees)){
            $employees = Employee::all();
        }

            $searchBar = new SearchBar();
            $employees = $searchBar->search($employees, $request['searchbar']);

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

        if (isset($request['hobbies'])) {
            $hobbyFilter = new HobbyFilter();
            $employees = $hobbyFilter->filter($employees, $request['hobbies']);
        }

        if (isset($request['lectorates'])) {
            $LectorateFilter = new LectorateFilter();
            $employees = $LectorateFilter->filter($employees, $request['lectorates']);
        }

        if (isset($request['expertises'])) {
            $expertiseFilter = new ExpertiseFilter();
            $employees = $expertiseFilter->filter($employees, $request['expertises']);
        }

        if (isset($request['minors'])) {
            $minorFilter = new MinorFilter();
            $employees = $minorFilter->filter($employees, $request['minors']);
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
