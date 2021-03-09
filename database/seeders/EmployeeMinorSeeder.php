<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeMinor;
use App\Models\Minor;
use Illuminate\Database\Seeder;

class EmployeeMinorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minors = Minor::paginate(5);
        $employees = Employee::paginate(5);

        foreach ($employees as $employee) {
            foreach ($minors as $minor) {
                EmployeeMinor::firstOrCreate([
                    'employee_id' => $employee->id,
                    'minor_id' => $minor->id,
                ]);
            }
        }
    }
}
