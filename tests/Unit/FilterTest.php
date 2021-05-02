<?php

namespace Tests\Unit;

use App\Filters\HobbyFilter;
use App\Filters\LectorateFilter;
use App\Filters\MinorFilter;
use App\Filters\ExpertiseFilter;
use App\Http\Controllers\HomeController;
use App\Models\Employee;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Tests\DuskTestCase;

class FilterTest extends TestCase
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
        // The "Hardlopen" hobby has an id of 6
        $hobbyId = array("6" => "on");
        $hobbyFilter = new HobbyFilter();
        $employees = Employee::all();

        $hobbies = DB::table('employee')
            ->select('employee.id')
            ->join('employee_hobby', 'employee.id', '=', "employee_hobby.employee_id")
            ->join('hobby', 'employee_hobby.hobby_id', '=', 'hobby.id')
            ->whereIn('hobby.id', array_keys($hobbyId))
            ->get();

        foreach ($employees as $employee) {

            $forget = true;

            foreach ($hobbies as $hobby) {
                if ($hobby->id == $employee->hobby->id) {
                    $forget = false;
                }
            }

            if ($forget) {
                $employees->forget($employee->id - 1);
            }
        }

        $this->assertEquals($employees, $hobbyFilter->filter(Employee::all(), $hobbyId));
    }
    public function test_filter_employee_on_lectorate(){
        // The "Lectoraat Jeugd en Veiligheid" lectorate has an id of 6
        $lectorateId = array("6" => "on");
        $lectorateFilter = new LectorateFilter();
        $employees = Employee::all();

        $lectorates = DB::table('employee')
            ->select('employee.id')
            ->join('employee_lectorate', 'employee.id', '=', "employee_lectorate.employee_id")
            ->join('lectorate', 'employee_lectorate.lectorate_id', '=', 'lectorate.id')
            ->whereIn('lectorate.id', array_keys($lectorateId))
            ->get();

        foreach ($employees as $employee) {

            $forget = true;

            foreach ($lectorates as $lectorate) {
                if ($lectorate->id == $employee->lectorate->id) {
                    $forget = false;
                }
            }

            if ($forget) {
                $employees->forget($employee->id - 1);
            }
        }

        $this->assertEquals($employees, $lectorateFilter->filter(Employee::all(), $lectorateId));
    }
    public function test_filter_employee_on_minor(){
        // The "Creating Sustainable Business Solutions" minor has an id of 6
        $minorId = array("6" => "on");
        $minorFilter = new MinorFilter();
        $employees = Employee::all();

        $minors = DB::table('employee')
            ->select('employee.id')
            ->join('employee_minor', 'employee.id', '=', "employee_minor.employee_id")
            ->join('minor', 'employee_minor.minor_id', '=', 'minor.id')
            ->whereIn('minor.id', array_keys($minorId))
            ->get();

        foreach ($employees as $employee) {

            $forget = true;

            foreach ($minors as $minor) {
                if ($minor->id == $employee->minor->id) {
                    $forget = false;
                }
            }

            if ($forget) {
                $employees->forget($employee->id - 1);
            }
        }

        $this->assertEquals($employees, $minorFilter->filter(Employee::all(), $minorId));
    }

    public function test_filter_employee_on_expertise(){
        // The "Organisatorisch" expertise has an id of 6
        $expertiseId = array("6" => "on");
        $expertiseFilter = new ExpertiseFilter();
        $employees = Employee::all();

        $expertises = DB::table('employee')
            ->select('employee.id')
            ->join('employee_expertise', 'employee.id', '=', "employee_expertise.employee_id")
            ->join('expertise', 'employee_expertise.expertise_id', '=', 'expertise.id')
            ->whereIn('expertise.id', array_keys($expertiseId))
            ->get();

        foreach ($employees as $employee) {

            $forget = true;

            foreach ($expertises as $expertise) {
                if ($expertise->id == $employee->expertise->id) {
                    $forget = false;
                }
            }

            if ($forget) {
                $employees->forget($employee->id - 1);
            }
        }

        $this->assertEquals($employees, $expertiseFilter->filter(Employee::all(), $expertiseId));
    }
}
