<?php

use App\Filters\HobbyFilter;
use App\Filters\LectorateFilter;
use App\Filters\MinorFilter;
use App\Filters\ExpertiseFilter;
use App\Filters\RoleFilter;
use App\Http\Controllers\HomeController;
use App\Models\Employee;
use App\Models\EmployeeExpertise;
use App\Models\EmployeeHobby;
use App\Models\EmployeeLectorate;
use App\Models\EmployeeMinor;
use App\Models\Expertise;
use App\Models\Hobby;
use App\Models\Lectorate;
use App\Models\Minor;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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
     * A test to filter employees with a specific hobby.
     *
     * @return void
     */
    public function test_filter_employee_on_hobby(){
        $userAmount = 3;
        $employees = new Collection();
        $hobby = Hobby::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            EmployeeHobby::factory()->create(['employee_id' => $user->id, 'hobby_id' => $hobby->id]);
            $employees->prepend($emp);
        }
        $hobbyFilter = new HobbyFilter();
        $employeesFiltered = $hobbyFilter->filter($employees, [$hobby->id => 'on']);
        $hobbyPivot = EmployeeHobby::where('hobby_id', $hobby->id)->get();
        $this->assertEquals(sizeof($hobbyPivot), sizeof($employeesFiltered));
    }
    /**
     * A test to filter employees with a specific lectorate.
     *
     * @return void
     */
    public function test_filter_employee_on_lectorate(){
        $userAmount = 3;
        $employees = new Collection();
        $lectorate = Lectorate::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            EmployeeLectorate::factory()->create(['employee_id' => $user->id, 'lectorate_id' => $lectorate->id]);
            $employees->prepend($emp);
        }
        $lectorateFilter = new lectorateFilter();
        $employeesFiltered = $lectorateFilter->filter($employees, [$lectorate->id => 'on']);
        $lectoratePivot = EmployeeLectorate::where('lectorate_id', $lectorate->id)->get();
        $this->assertEquals(sizeof($lectoratePivot), sizeof($employeesFiltered));
    }
    /**
     * A test to filter employees with a specific minor.
     *
     * @return void
     */
    public function test_filter_employee_on_minor(){
        $userAmount = 3;
        $employees = new Collection();
        $minor = Minor::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            EmployeeMinor::factory()->create(['employee_id' => $user->id, 'minor_id' => $minor->id]);
            $employees->prepend($emp);
        }
        $minorFilter = new minorFilter();
        $employeesFiltered = $minorFilter->filter($employees, [$minor->id => 'on']);
        $minorPivot = EmployeeMinor::where('minor_id', $minor->id)->get();
        $this->assertEquals(sizeof($minorPivot), sizeof($employeesFiltered));
    }
    /**
     * A test to filter employees with a specific expertise.
     *
     * @return void
     */
    public function test_filter_employee_on_expertise(){
        $userAmount = 3;
        $employees = new Collection();
        $expertise = Expertise::factory()->create();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            EmployeeExpertise::factory()->create(['employee_id' => $user->id, 'expertise_id' => $expertise->id]);
            $employees->prepend($emp);
        }
        $expertiseFilter = new expertiseFilter();
        $employeesFiltered = $expertiseFilter->filter($employees, [$expertise->id => 'on']);
        $expertisePivot = EmployeeExpertise::where('expertise_id', $expertise->id)->get();
        $this->assertEquals(sizeof($expertisePivot), sizeof($employeesFiltered));
    }
}
