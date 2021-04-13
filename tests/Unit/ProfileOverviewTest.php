<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\User;
use App\Models\WorkHour;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ProfileOverviewTest extends TestCase
{
    /**
     * An unit test for the profiles overview page.
     *
     */

    use RefreshDatabase;

    public function test_home_profile_overview_view_can_be_rendered()
    {
        $employee = Employee::factory()->make();
        $user = User::factory()->make();
        $workHour = WorkHour::where('employee_id', 20)->get();

        $view = $this->view('employee/profile', ['employee'=> $employee, 'user' => $user, 'workHour' => $workHour]);

        $view->assertSee($employee->firstname);
        $view->assertSee($employee->lastname);
    }
}
