<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationMail;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
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

    public function index() {
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
     * @return User
     */
    public function registerNewUser(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email'
            ]);

        if ($request->isAdmin)
            $roles = Role::where('name', 'Admin')->get(['id'])->first();
        else
            $roles = Role::where('name', 'Docent')->get(['id'])->first();

        $randomPassword = Str::random(20);
        $users = new User;
        $users->email = $request->email;
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
