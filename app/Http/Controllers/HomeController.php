<?php


namespace App\Http\Controllers;

use App\Filters\ExpertiseFilter;
use App\Filters\HobbyFilter;
use App\Filters\LectorateFilter;
use App\Filters\MinorFilter;
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
     * @param Request $request
     * @return Renderable|RedirectResponse
     */
    public function index(Request $request)
    {
        $arrayEmployeeIds = [];
        if(isset($request["searchbar"])){
            $stringToFilter = $request["searchbar"];
            if (strlen($stringToFilter) > 0)
            {
                $splitStringToFilter = explode(" ", $stringToFilter);
                foreach ($splitStringToFilter as $filter) {
                    $employees = Employee::select('id')->where('firstname', 'LIKE', '%' . $filter . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $filter . '%')
                    ->get();
                    foreach($employees as $employee) {
                        if(!in_array($employee->id, $arrayEmployeeIds)){
                            array_push($arrayEmployeeIds, $employee->id);
                        }
                    }

                    $expertises = Expertise::where('name', 'LIKE', '%' . $filter . '%')->get();
                    foreach($expertises as $expertise) {
                        $expertiseEmployees = $expertise->employees()->get();
                        $expertiseEmployeeIds = $expertiseEmployees->pluck('id');
                        foreach($expertiseEmployeeIds as $id) {
                            if(!in_array($id, $arrayEmployeeIds)){
                                array_push($arrayEmployeeIds, $id);
                            }
                        }
                    }

                    $functions = Role::where('name', 'LIKE', '%' . $filter . '%')->get();
                    foreach($functions as $function) {
                        $functionEmployees = $function->employee()->get();
                        $functionEmployeeIds = $functionEmployees->pluck('id');
                        foreach($functionEmployeeIds as $id) {
                            if(!in_array($id, $arrayEmployeeIds)){
                                array_push($arrayEmployeeIds, $id);
                            }
                        }
                    }

                }

                $employees = Employee::whereIn('id', $arrayEmployeeIds)->get();
            }

        }

        if(!isset($employees)){
            $employees = Employee::all();
        }

        if (isset($request['courses'])) {
            $courseFilter = new CourseFilter();
            $employees = $courseFilter->filter($employees, $request['courses']);
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

        if (isset($request['minors'])) {
            $minorFilter = new MinorFilter();
            $employees = $minorFilter->filter($employees, $request['minors']);
        }

        return view('home', compact(["request", "employees", "courses", "departments", "expertises", "hobbies", "learningLines", "lectorates", "minors", "roles", "workDays"]));
    }
}
