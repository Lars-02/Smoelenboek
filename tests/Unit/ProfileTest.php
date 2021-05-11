<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\User;
use App\Models\WorkDay;
use App\Models\WorkHour;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * An unit test for a profile page view.
     *
     */

    use RefreshDatabase;

    //Assert if the view contains the right name and inherently renders
    public function test_profile_view_can_be_rendered()
    {
        $user = User::factory()
        ->create([
        'id' => 1
        ]);

        $employee = Employee::factory()
            ->create([
            'user_id' => 1,
            'firstname' => 'Test',
            'lastname' => 'User',
        ]);

        $amount = 5;
        $workHour = [];
        for($i = 1; $i <= $amount; $i++)
        {
            $day = WorkDay::factory()->create();
            array_push($workHour, DB::table('employee_work_day')->insert(['employee_id' => $employee->id, 'work_day_id' => $day->id]));
        }

        $view = $this->view('employee/profile', ['employee'=> $employee, 'user' => $user, 'workHour' => $workHour]);

        $view->assertSee($employee->firstname);
        $view->assertSee($employee->lastname);
    }
}
