<?php

namespace App\Http\Controllers;

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
    public function registerNewUser(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required|email|unique:users,email'
        ]);

        $randomPassword = Str::random(20);
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($randomPassword);

        if ($request->isAdmin) {
            $this->role = Role::where('name', 'Admin')->get(['id'])->first();
        } else {
            $this->role = Role::where('name', 'Docent')->get(['id'])->first();
        }

        DB::transaction(function () use ($user) {
            $user->save();
            DB::table('role_user')->insert(['user_id' => $user->id, 'role_id' => $this->role->id]);
        });

        Mail::to( $users->email)->send(new RegistrationMail($users , $randomPassword));

        return redirect()->route('home');
    }
}
