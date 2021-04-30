<?php

namespace Tests\Unit;

use App\Filters\LearningLineFilter;
use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use PhpParser\ErrorHandler\Collecting;
use Tests\DuskTestCase;

use function PHPUnit\Framework\assertEquals;

class FilterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_filter_employee_on_learning_line_success()
    {
        $userAmount = 3;

        $employees = new Collection();
        $learningLine = LearningLine::factory()->make();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->make();
            $emp = Employee::factory()->make(['user_id' => $user->id]);
            EmployeeLearningLine::factory()->make(['employee_id' => $emp->id, 'learning_line_id' => $learningLine->id]);
            $employees->prepend($emp);
        }
        $courseFilter = new LearningLineFilter();
        $employeesFiltered = $courseFilter->filter($employees, [$learningLine->id => 'on']);

        $learningLinesPivot = EmployeeLearningLine::where('learning_line_id', $learningLine->id)->get();
        $this->assertEquals(sizeof($learningLinesPivot), sizeof($employeesFiltered));
    }

    public function test_filter_employee_on_learning_line_fail()
    {
        $userAmount = 3;

        $employees = new Collection();
        $learningLine = LearningLine::factory()->make();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->make();
            $emp = Employee::factory()->make(['user_id' => $user->id]);
            EmployeeLearningLine::factory()->make(['employee_id' => $emp->id, 'learning_line_id' => $learningLine->id]);
            $employees->prepend($emp);
        }
        $courseFilter = new LearningLineFilter();
        $employeesFiltered = $courseFilter->filter($employees, [$learningLine->id + 1 => 'on']);
        if(sizeof($employeesFiltered) == 0) $this->assertTrue(true);
    }
}
