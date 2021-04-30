<?php

namespace Tests\Unit;

use App\Filters\RoleFilter;
use App\Http\Controllers\HomeController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Tests\DuskTestCase;

class FilterTest extends DuskTestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {

        parent::setUp();
    }

    /**
     * A test to filter employees with a specific role.
     *
     * @return void
     */
    public function test_filter_employee_on_role(){
        $roleId = array("7" => "on");
        $roleFilter = new RoleFilter();
        $employees = Employee::all();

        $users = DB::table('user')
            ->select('user.id')
            ->join('role_user', 'user.id', '=', "role_user.user_id")
            ->join('role', 'role_user.role_id', '=', 'role.id')
            ->whereIn('role.id', array_keys($roleId))
            ->get();

        foreach ($employees as $employee) {

            $forget = true;

            foreach ($users as $user) {
                if ($user->id == $employee->user->id) {
                    $forget = false;
                }
            }

            if ($forget) {
                $employees->forget($employee->id - 1);
            }
        }

        $this->assertEquals($employees, $roleFilter->filter(Employee::all(), $roleId));
    }
}
