<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Filters\LearningLineFilter;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
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

        if (isset($request['learningLines'])) {
            $courseFilter = new LearningLineFilter();
            $employees = $courseFilter->filter($employees, $request['learningLines']);
        }

        $courses = Course::all();
        $departments = Department::all();
        $expertises = Expertise::all();
        $hobbies = Hobby::all();
        $learningLines = LearningLine::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();

        return view('home', compact(["request", "employees", "courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors"]));
    }
}
