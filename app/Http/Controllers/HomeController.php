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
use Illuminate\Support\Collection;

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
            $employees = Employee::all()->sortBy('lastname')->sortBy('firstname');
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
        $roles = Role::all();
        $workDays = WorkDay::all();

        $filteredItems = $this->filteredItems($request);

        return view('home', compact(["request", "employees", "courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles", "workDays", "filteredItems"]));
    }

    protected function filteredItems(IndexHomeRequest $request) : Collection{
        $filteredItems = collect();

        $courses = Course::all();
        $departments = Department::all();
        $expertises = Expertise::all();
        $hobbies = Hobby::all();
        $learningLines = LearningLine::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $roles = Role::all();
        $workDays = WorkDay::all();

        if ($request->filled('searchbar')){
            $searchQuery = new \stdClass();
            $searchQuery->name =  '"'.$request->get('searchbar').'"';
            $filteredItems->add($searchQuery);
        }

        foreach($courses as $course){
            if(isset($request->get("courses")[$course->id]))
                $filteredItems->add($course);
        }

        foreach($departments as $department){
            if(isset($request->get("departments")[$department->id]))
                $filteredItems->add($department);
        }

        foreach($expertises as $expertise){
            if(isset($request->get("expertises")[$expertise->id]))
                $filteredItems->add($expertise);
        }

        foreach($hobbies as $hobby){
            if(isset($request->get("hobbies")[$hobby->id]))
                $filteredItems->add($hobby);
        }

        foreach($learningLines as $learningLine){
            if(isset($request->get("learningLines")[$learningLine->id]))
                $filteredItems->add($learningLine);
        }

        foreach($lectorates as $lectorate){
            if(isset($request->get("lectorates")[$lectorate->id]))
                $filteredItems->add($lectorate);
        }

        foreach($minors as $minor){
            if(isset($request->get("minors")[$minor->id]))
                $filteredItems->add($minor);
        }

        foreach($roles as $role){
            if(isset($request->get("roles")[$role->id]))
                $filteredItems->add($role);
        }

        foreach($workDays as $workDay){
            if(isset($request->get("workDays")[$workDay->id]))
                $filteredItems->add($workDay);
        }

        return $filteredItems;
    }
}
