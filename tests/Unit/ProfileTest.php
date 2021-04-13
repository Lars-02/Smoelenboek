<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\User;
use App\Models\WorkHour;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $employee = Employee::factory()->make([
            'firstname' => 'Test',
            'lastname' => 'User',
            'department'=>'AFM'
        ]);
        $user = User::factory()->make();
        $workHour = WorkHour::where('employee_id', 20)->get();

        $view = $this->view('employee/profile', ['employee'=> $employee, 'user' => $user, 'workHour' => $workHour]);

        $view->assertSee($employee->firstname);
        $view->assertSee($employee->lastname);
    }
}
