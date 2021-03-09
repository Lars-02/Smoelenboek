<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeLectorate;
use App\Models\Lectorate;
use Illuminate\Database\Seeder;

class EmployeeLectorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lectorates = Lectorate::paginate(5);
        $employees = Employee::paginate(5);

        foreach ($lectorates as $lectorate) {
            foreach ($employees as $employee) {
                EmployeeLectorate::firstOrCreate([
                    'lectorate_id' => $lectorate->id,
                    'employee_id' => $employee->id,
                ]);
            }
        }

    }
}
