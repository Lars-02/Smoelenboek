<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
