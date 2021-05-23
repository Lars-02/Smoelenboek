<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Filters\DepartmentFilter;
use App\Filters\ExpertiseFilter;
use App\Filters\HobbyFilter;
use App\Filters\LearningLineFilter;
use App\Filters\LectorateFilter;
use App\Filters\MinorFilter;
use App\Filters\RoleFilter;
use App\Filters\WorkDayFilter;
use App\Http\Requests\HomeRequests\IndexHomeRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
use App\Models\SearchBar;
use App\Models\WorkDay;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable|RedirectResponse
     */
    public function index(IndexHomeRequest $request)
    {
        $validated = $request->validated();

        if (!isset($employees)) {
            $employees = Employee::all();
        }

        if (!is_null($request['searchbar'])) {
            $searchBar = new SearchBar();
            $employees = $searchBar->search($employees, $validated['searchbar']);
        }

        if (isset($validated['courses'])) {
            $courseFilter = new CourseFilter();
            $employees = $courseFilter->filter($employees, $validated['courses']);
        }

        if (isset($validated['roles'])) {
            $functionFilter = new RoleFilter();
            $employees = $functionFilter->filter($employees, $validated['roles']);
        }

        if (isset($validated['workDays'])) {
            $workDayFilter = new WorkDayFilter();
            $employees = $workDayFilter->filter($employees, $validated['workDays']);
        }

        if (isset($validated['learningLines'])) {
            $learningLineFilter = new LearningLineFilter();
            $employees = $learningLineFilter->filter($employees, $validated['learningLines']);
        }

        if (isset($validated['departments'])) {
            $departmentFilter = new DepartmentFilter();
            $employees = $departmentFilter->filter($employees, $validated['departments']);
        }

        if (isset($validated['hobbies'])) {
            $hobbyFilter = new HobbyFilter();
            $employees = $hobbyFilter->filter($employees, $validated['hobbies']);
        }

        if (isset($validated['lectorates'])) {
            $LectorateFilter = new LectorateFilter();
            $employees = $LectorateFilter->filter($employees, $validated['lectorates']);
        }

        if (isset($validated['expertises'])) {
            $expertiseFilter = new ExpertiseFilter();
            $employees = $expertiseFilter->filter($employees, $validated['expertises']);
        }

        if (isset($validated['minors'])) {
            $minorFilter = new MinorFilter();
            $employees = $minorFilter->filter($employees, $validated['minors']);
        }

        $courses = Course::all();
        $departments = Department::all();
        $expertises = Expertise::all();
        $hobbies = Hobby::all();
        $learningLines = LearningLine::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $roles = Role::where('self_assignable', true)->get();
        $workDays = WorkDay::all();

        return view('home', compact(["request", "employees", "courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles", "workDays"]));
    }
}
