<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeHobby;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\Role;
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
        $employees = Employee::all();
        $hobbies = Hobby::all();
        $lectorates = Lectorate::all();
        $minors = Minor::all();
        $expertises = Expertise::all();
        return view('home', compact(["employees", "hobbies", "lectorates", "minors", "expertises"]));
    }
    public static function filterHobby($option)
    {
        $option = Hobby::where('name', $option)->first();
        $hobbies = EmployeeHobby::all();
        $employees = [];

        foreach($hobbies as $hobby)
        {
            if($hobby->hobby_id == $option->id)
            {
                $employee = Employee::find($hobby->employee_id);
                array_push($employees, $employee);
            }
        }
        return $employees;
    }
    public static function filterLectorate($option)
    {
        $option = Lectorate::where('name', $option)->first();
        $lectorates = EmployeeLectorate::all();
        $employees = [];

        foreach($lectorates as $lectorate)
        {
            if($lectorate->lectorate_id == $option->id)
            {
                $employee = Employee::find($lectorate->employee_id);
                array_push($employees, $employee);
            }
        }
        return $employees;
    }
    public static function filterMinor($option)
    {
        $option = Minor::where('name', $option)->first();
        $minors = EmployeeMinor::all();
        $employees = [];

        foreach($minors as $minor)
        {
            if($minor->minor_id == $option->id)
            {
                $employee = Employee::find($minor->employee_id);
                array_push($employees, $employee);
            }
        }
        return $employees;
    }
    public static function filterExpertise($option)
    {
        $option = Expertise::where('name', $option)->first();
        $expertises = EmployeeExpertise::all();
        $employees = [];

        foreach($expertises as $expertise)
        {
            if($expertise->minor_id == $option->id)
            {
                $employee = Employee::find($expertise->employee_id);
                array_push($employees, $employee);
            }
        }
        return $employees;
    }
}
