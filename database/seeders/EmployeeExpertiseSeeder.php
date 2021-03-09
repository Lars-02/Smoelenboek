<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeExpertise;
use App\Models\Expertise;
use Illuminate\Database\Seeder;

class EmployeeExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expertises = Expertise::paginate(5);
        $employees = Employee::paginate(5);

        foreach ($expertises as $expertise) {
            foreach ($employees as $employee) {
                EmployeeExpertise::firstOrCreate([
                    'expertise_id' => $expertise->id,
                    'employee_id' => $employee->id,
                ]);
            }
        }

    }
}
