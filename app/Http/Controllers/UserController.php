<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cinemas\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;
use App\Mail\RegistrationMail;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function registerNewUser(CreateUserRequest $request)
    {
        $validated = $request->validated();

        $randomPassword = $password = Str::random(20);
        $user = new User;
        $user->email = $validated['email'];
        $user->password = Hash::make($randomPassword);

        $role = null;
        if ($validated['isAdmin']) {
            $role = Role::where('name', 'Admin')->get(['id'])->first();
        } else {
            $role = Role::where('name', 'Docent')->get(['id'])->first();
        }

        $roleUser = new RoleUser;
        $roleUser->role_id = $role->id;

        DB::transaction(function () use ($user, $roleUser) {
            $user->save();
            $roleUser->user_id = $user->id;
            $roleUser->save();
        });

        Mail::to( $user->email)->send(new RegistrationMail($user , $randomPassword));

        return redirect()->route('home');
    }
}
