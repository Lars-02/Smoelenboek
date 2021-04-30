<?php

namespace App\Http\Controllers;

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
    public function registerNewUser(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required|email|unique:user,email'
        ]);

        $randomPassword = $password = Str::random(20);
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($randomPassword);

        $role = null;
        if ($request->isAdmin) {
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
        try{
            Employee::factory()->create(['user_id' => $user->id]);
        }
        catch(Exception $ex){
        }

        Mail::to( $user->email)->send(new RegistrationMail($user , $randomPassword));

        return redirect()->route('home');
    }
}
