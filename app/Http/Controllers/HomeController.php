<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Filters\MinorFilter;
use App\Filters\RoleFilter;
use App\Filters\WorkDayFilter;
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

        if (isset($request['Hobbies'])) {
            $courseFilter = new HobbyFilter();
            $employees = $courseFilter->filter($employees, $request['Hobbies']);
        }

        if (isset($request['Lectorates'])) {
            $courseFilter = new LectorateFilter();
            $employees = $courseFilter->filter($employees, $request['Lectorates']);
        }

        if (isset($request['expertises'])) {
            $functionFilter = new ExpertiseFilter();
            $employees = $functionFilter->filter($employees, $request['expertises']);
        }

        if (isset($request['Minors'])) {
            $workDayFilter = new MinorFilter();
            $employees = $workDayFilter->filter($employees, $request['Minors']);
        }

        $employees = Employee::all();
        $hobbies = Hobby::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $expertises = Expertise::all();
        return view('home', compact(["employees", "hobbies", "lectorates", "minors", "expertises"]));
    }
}
