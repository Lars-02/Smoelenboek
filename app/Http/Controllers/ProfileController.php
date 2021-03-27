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


    public function user($employee) {

        $employee = Employee::where('username', '=' , $employee);

        if($employee->count()) {
            $employee = $employee->first();

            $user = User::find($employee->user_id);

            $workHour = WorkHour::where('employee_id', '=' , $employee->id)->get();

            return View::make('employee/profile', ['employee'=> $employee], ['user' => $user, 'workHour' => $workHour]);
        }

        return abort(404);
    }


}
