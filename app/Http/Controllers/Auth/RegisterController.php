<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\CreateUserRequest;
use App\Mail\RegistrationMail;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        $user = auth()->user();

        if($user != null && $user->isAdmin() != null)
            return view('auth.register');

        else if($user != null)
            return redirect()->route('home');

        return redirect()->route('auth.login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();

        if ($request->isAdmin)
            $roles = Role::where('name', 'Admin')->get(['id'])->first();
        else
            $roles = Role::where('name', 'Docent')->get(['id'])->first();

        $randomPassword = Str::random(20);
        $users = new User;
        $users->email = $validated['email'];
        $users->password = Hash::make($randomPassword);

        DB::transaction(function () use ($users, $roles) {
            $users->save();
            $users->roles()->attach($roles);
            $roles->save();
        });

        Mail::to( $users->email)->send(new RegistrationMail($users , $randomPassword));

        return redirect()->route('home');
    }
}
