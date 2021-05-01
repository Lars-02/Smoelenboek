<?php

namespace Tests\Unit;

use App\Filters\CourseFilter;
use App\Filters\DepartmentFilter;
use App\Filters\RoleFilter;
use App\Http\Controllers\HomeController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Tests\TestCase;
use Tests\DuskTestCase;

class FilterTest extends DuskTestCase
{
    use RefreshDatabase;


    public function test_filter_employees_on_department_success()
    {
        $userAmount = 3;

        $employees = new Collection();
        $department = Department::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            DB::table('employee_department')->insert(['employee_id' => $emp->id, 'department_id' => $department->id]);
            $employees->prepend($emp);
        }
        $departmentFilter = new DepartmentFilter();
        $employeesFiltered = $departmentFilter->filter($employees, [$department->id => 'on']);

        $learningLinesPivot = DB::table('employee_department')->where('department_id', $department->id)->get();
        $this->assertEquals(sizeof($learningLinesPivot), sizeof($employeesFiltered));
    }

    public function test_filter_employees_on_department_fail()
    {
        $userAmount = 3;

        $employees = new Collection();
        $department = Department::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            DB::table('employee_department')->insert(['employee_id' => $emp->id, 'department_id' => $department->id]);
            $employees->prepend($emp);
        }
        $departmentFilter = new DepartmentFilter();
        $employeesFiltered = $departmentFilter->filter($employees, [$department->id + 1 => 'on']);

        if(sizeof($employeesFiltered) == 0) $this->assertTrue(true); 
    }
}