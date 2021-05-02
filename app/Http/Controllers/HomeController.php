<?php


namespace App\Http\Controllers;

use App\Filters\ExpertiseFilter;
use App\Filters\HobbyFilter;
use App\Filters\LectorateFilter;
use App\Filters\MinorFilter;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Hobby;
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
     * @param Request $request
     * @return Renderable|RedirectResponse
     */
    public function index(Request $request)
    {
        {
            $employees = Employee::all();
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
            $hobbies = Hobby::all();
            $lectorates = Lectorate::all();
            $minors = Minor::all();
            $expertises = Expertise::all();

            return view('home', compact(["request", "employees", "hobbies", "lectorates", "minors", "expertises"]));
        }
    }
}
