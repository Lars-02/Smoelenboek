<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\EmployeeExpertise;
use App\Models\Expertise;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\SearchBar\SearchBar;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;

class SearchBarTest extends DuskTestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A test to search employees on function/role.
     *
     * @return void
     */
    public function test_search_employee_on_role(){
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
        $searchBar = new SearchBar();
        $employeesSearched = $searchBar->search($employees, $role->name);

        $rolePivot = RoleUser::where('role_id', $role->id)->get();
        $this->assertEquals(sizeof($rolePivot), sizeof($employeesSearched));
    }

    /**
     * A test to search employees on expertise.
     *
     * @return void
     */
    public function test_search_employee_on_expertise(){
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
        $searchBar = new SearchBar();
        $employeesSearched = $searchBar->search($employees, $expertise->name);

        $expertisePivot = EmployeeExpertise::where('expertise_id', $expertise->id)->get();
        $this->assertEquals(sizeof($expertisePivot), sizeof($employeesSearched));
    }

    /**
     * A test to search employees on firstname.
     *
     * @return void
     */
    public function test_search_employee_on_firstname(){
        $userAmount = 3;

        $employees = new Collection();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            $employees->prepend($emp);
        }
        $employeeToSearch = $employees->random();
        $searchBar = new SearchBar();
        $employeesSearched = $searchBar->search($employees, $employeeToSearch->firstname);

        $employeePivot = Employee::where('id', $employeeToSearch->id)->get();
        $this->assertEquals(sizeof($employeePivot), sizeof($employeesSearched));
    }

    /**
     * A test to search employees on lastname.
     *
     * @return void
     */
    public function test_search_employee_on_lastname(){
        $userAmount = 3;

        $employees = new Collection();
        for($i = 0; $i < $userAmount; $i++)
        {
            $user = User::factory()->create();
            $emp = Employee::factory()->create(['user_id' => $user->id]);
            $employees->prepend($emp);
        }
        $employeeToSearch = $employees->random();
        $searchBar = new SearchBar();
        $employeesSearched = $searchBar->search($employees, $employeeToSearch->lastname);

        $employeePivot = Employee::where('id', $employeeToSearch->id)->get();
        $this->assertEquals(sizeof($employeePivot), sizeof($employeesSearched));
    }

}
