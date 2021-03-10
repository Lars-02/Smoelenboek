<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseEmployee;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CourseEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseEmployee::factory()->times(20)->create();
    }
}
