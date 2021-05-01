<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Models\Course;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\LearningLine;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
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

        $arrayEmployeeIds = [];
        if(isset($request["searchbar"])){
            $stringToFilter = $request["searchbar"];
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
                    $expertiseEmployees = $expertise->employee()->get();
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
        } else {
            $employees = Employee::all();
        }


        if (isset($request['courses'])) {
            $courseFilter = new CourseFilter();
            $employees = $courseFilter->filter($employees, $request['courses']);
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
