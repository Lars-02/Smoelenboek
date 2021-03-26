<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Expertise;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkHour;
use Illuminate\Http\Request;
Use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;


class ProfileController extends Controller {


    public function user($user) {

        $user = Employee::where('username', '=' , $user);

        if($user->count()) {
            $user = $user->first();

            return View::make('employee/profile')
                ->with('user', $user);
        }

        return abort(404);
    }


}
