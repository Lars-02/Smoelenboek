<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use Illuminate\Database\Seeder;

class EmployeeLearningLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $learningLines = LearningLine::paginate(5);
        $employees = Employee::paginate(5);

        foreach ($learningLines as $learningLine) {
            foreach ($employees as $employee) {
                EmployeeLearningLine::firstOrCreate([
                    'learning_line_id' => $learningLine->id,
                    'employee_id' => $employee->id,
                ]);
            }
        }

    }
}
