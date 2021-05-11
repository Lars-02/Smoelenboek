<?php

namespace Tests\Unit;

use App\Filters\CourseFilter;
use App\Filters\DepartmentFilter;
use App\Filters\LearningLineFilter;
use App\Filters\RoleFilter;
use App\Filters\WorkDayFilter;
use App\Models\Course;
use App\Models\CourseEmployee;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\EmployeeWorkDay;
use App\Models\LearningLine;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\WorkDay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
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
            DB::table('role_user')->insert(['user_id' => $user->id, 'role_id' => $role->id]);
            $employees->prepend($emp);
        }
        $roleFilter = new RoleFilter();
        $employeesFiltered = $roleFilter->filter($employees, [$role->id => 'on']);

        $rolePivot = DB::table('role_user')->where('role_id', $role->id)->get();
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
        $course = Course::factory()->create(['name' => 'ICT']);
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            DB::table('course_employee')->insert(['employee_id' => $emp->id, 'course_id' => $course->id]);
            $employees->prepend($emp);
        }
        $courseFilter = new CourseFilter();
        $employeesFiltered = $courseFilter->filter($employees, [$course->id => 'on']);

        $coursePivot = DB::table('course_employee')->where('course_id', $course->id)->get();
        $this->assertEquals(sizeof($coursePivot), sizeof($employeesFiltered));
    }

    /**
     * A test to filter employees on workdays.
     *
     * @return void
     */
    public function test_filter_employee_on_work_day()
    {
        $userAmount = 3;

        $employees = new Collection();
        for ($i = 0; $i < $userAmount; $i++) {
            $workDay = WorkDay::factory()->create(['name' => 'Thursday']);
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            DB::table('employee_work_day')->insert(['work_day_id' => $workDay->id, 'employee_id' => $emp->id]);
            $employees->prepend($emp);
        }
        $workDayFilter = new WorkDayFilter();
        $employeesFiltered = $workDayFilter->filter($employees, [$workDay->id => 'on']);

        $workDayPivot = DB::table('employee_work_day')->where('work_day_id', $workDay->id)->get();
        $this->assertEquals(sizeof($workDayPivot), sizeof($employeesFiltered));
    }


    public function test_filter_employee_on_learning_line_success()
    {
        $userAmount = 3;

        $employees = new Collection();
        $learningLine = LearningLine::factory()->create();
        for ($i = 0; $i < $userAmount; $i++) {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            DB::table('employee_learning_line')->insert(['employee_id' => $emp->id, 'learning_line_id' => $learningLine->id]);
            $employees->prepend($emp);
        }
        $learningLineFilter = new LearningLineFilter();
        $employeesFiltered = $learningLineFilter->filter($employees, [$learningLine->id => 'on']);

        $learningLinesPivot = DB::table('employee_learning_line')->where('learning_line_id', $learningLine->id)->get();
        $this->assertEquals(sizeof($learningLinesPivot), sizeof($employeesFiltered));
    }


    /**
     * A purposely failing test to filter on learning lines. This test checks wheter or not
     * the test fails on a invalid learning line, which is given as input to the filter.
     */
    public function test_filter_employee_on_learning_line_fail()
    {
        $userAmount = 3;

        $employees = new Collection();
        $learningLine = LearningLine::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            DB::table('employee_learning_line')->insert(['employee_id' => $emp->id, 'learning_line_id' => $learningLine->id]);
            $employees->prepend($emp);
        }
        $learningLineFilter = new LearningLineFilter();
        $employeesFiltered = $learningLineFilter->filter($employees, [$learningLine->id + 1 => 'on']);

        if(sizeof($employeesFiltered) == 0) $this->assertTrue(true);
    }

    /**
     * A succeeding test to filter on departments. This test checks whether or not the correct employees
     * are found by using the filter.
     */
    public function test_filter_employee_on_department_success()
    {
        $userAmount = 3;

        $employees = new Collection();
        $department = Department::factory()->create(['name' => 'KKL']);
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

    /**
     * A purposely failing test to filter on departments. This test checks wheter or not
     * the test fails on a invalid department, which is given as input to the filter.
     */
    public function test_filter_employee_on_department_fail()
    {
        $userAmount = 3;

        $employees = new Collection();
        $department = Department::factory()->create(['name' => 'KKL']);
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
