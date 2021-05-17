<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
use App\Models\WorkDay;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. This controller also handles finalization of
    | the registration by creating and storing an employee model.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index() {
        $user = auth()->user();

        if($user != null && $user->isAdmin() != null)
            return view('auth.register');

        else if($user != null)
            return redirect()->route('home');

        return redirect()->route('auth.login');
    }

    /**
     * Validates an incoming registration request.
     *
     */
    protected function validateEmployee()
    {
        return request()->validate([
            'user_id' => 'required|unique:employees',
            'firstname' => 'required|alpha|min:2|max:40',
            'lastname' => 'required|min:2|max:40',
            'phoneNumber' => array('required', 'regex:/^((\+31)|(0031)|0)(\(0\)|)(\d{1,3})(\s|\-|)(\d{8}|\d{4}\s\d{4}|\d{2}\s\d{2}\s\d{2}\s\d{2})$/'),
            'departments' => 'required|exists:departments,id',
            'expertises' => 'required|exists:expertises,id',
            'roles' => 'required|exists:roles,id',
            'workDays' => 'required|exists:work_days,id',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = Auth::user();
        $departments = Department::all()->pluck('name', 'id');
        $roles = Role::all()->whereNotIn('id', 1)->pluck('name', 'id');
        $expertises = Expertise::all()->pluck('name', 'id');
        $workDays = WorkDay::all();

        return view('employee.create', compact(['user', 'departments', 'roles', 'expertises', 'workDays']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = $this->validateEmployee();

        $employee = Employee::create($validated);

        $employee->departments()->sync($validated['departments']);
        $employee->expertises()->sync($validated['expertises']);
        $employee->workDays()->sync($validated['workDays']);
        $employee->save();

        $employee->user->roles()->sync($validated['roles']);
        $employee->user->save();

        return redirect(route('home'));
    }
}
