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
        $courses = Course::paginate(5);
        $employees = Employee::paginate(5);

        foreach ($courses as $course) {
            foreach ($employees as $employee) {
                CourseEmployee::firstOrCreate([
                    'course_id' => $course->id,
                    'employee_id' => $employee->id,
                ]);
            }
        }

    }
}
