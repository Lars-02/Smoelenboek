<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;


class ProfileController extends Controller {


    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|Response
     */
    public function show(Employee $employee)
    {
        return view('employee.profile', compact(["employee"]));
    }
}
