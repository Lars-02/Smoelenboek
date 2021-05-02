<?php

namespace Tests\Unit;

use App\Filters\CourseFilter;
use App\Filters\RoleFilter;
use App\Filters\WorkDayFilter;
use App\Models\Course;
use App\Models\CourseEmployee;
use App\Models\Employee;
use App\Models\EmployeeWorkDay;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\WorkDay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Illuminate\Database\Eloquent\Collection;

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
        $userAmount = 3;

        $employees = new Collection();
        $role = Role::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            RoleUser::factory()->create(['user_id' => $user->id, 'role_id' => $role->id]);
            $employees->prepend($emp);
        }
        $roleFilter = new RoleFilter();
        $employeesFiltered = $roleFilter->filter($employees, [$role->id => 'on']);

        $rolePivot = RoleUser::where('role_id', $role->id)->get();
        $this->assertEquals(sizeof($rolePivot), sizeof($employeesFiltered));
    }

    /**
     * A test to filter employees with a specific course.
     *
     * @return void
     */
    public function test_filter_employee_on_course(){
        $userAmount = 3;

        $employees = new Collection();
        $course = Course::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            CourseEmployee::factory()->create(['employee_id' => $user->id, 'course_id' => $course->id]);
            $employees->prepend($emp);
        }
        $courseFilter = new CourseFilter();
        $employeesFiltered = $courseFilter->filter($employees, [$course->id => 'on']);

        $coursePivot = CourseEmployee::where('course_id', $course->id)->get();
        $this->assertEquals(sizeof($coursePivot), sizeof($employeesFiltered));
    }

    /**
     * A test to filter employees on workdays.
     *
     * @return void
     */
    public function test_filter_employee_on_work_day(){
        $userAmount = 3;

        // Hardcode id as there is no factory. Should be fine unless Wednesday stops existing.
        $workDayId = 3;

        $employees = new Collection();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            EmployeeWorkDay::factory()->create(['employee_id' => $user->id, 'work_day_id' => $workDayId]);
            $employees->prepend($emp);
        }
        $workDayFilter = new WorkDayFilter();
        $employeesFiltered = $workDayFilter->filter($employees, [$workDayId => 'on']);

        $workDayPivot = EmployeeWorkDay::where('work_day_id', $workDayId)->get();
        $this->assertEquals(sizeof($workDayPivot), sizeof($employeesFiltered));
    }
}
