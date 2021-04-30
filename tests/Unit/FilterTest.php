<?php

namespace Tests\Unit;

use App\Http\Controllers\HomeController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
     * A test to filter employees connected to a department.
     *
     * @return void
     */
    public function test_filter_employee__on_department()
    {
        $department = Department::inRandomOrder()->first();
        $employees = HomeController::filterDepartment($department->name);

        $employeesFromDB = Employee::where('department', $department->name)->get(); 
        if($employees == $employeesFromDB) $this->assertTrue(true);
        else $this->assertFalse(true);
    }

    /**
     * A test to filter employees with a specific learning line.
     *
     * @return void
     */
    public function test_filter_employee_on_learning_line()
    {
        $learningLine = LearningLine::inRandomOrder()->first();
        $employees = HomeController::filterLearningLine($learningLine->name);

        $employeeLearningLines = EmployeeLearningLine::where('learning_line_id', $learningLine->id)->get();
        $employeesFiltered = [];
        foreach($employeeLearningLines as $employeeLearningLine)
        {
            $emp = Employee::find($employeeLearningLine->employee_id);
            array_push($employeesFiltered, $emp);
        }
        if($employeesFiltered == $employees) $this->assertTrue(true);
        else $this->assertFalse(true);
    }
}