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
        EmployeeLearningLine::factory()->times(20)->create();
    }
}
