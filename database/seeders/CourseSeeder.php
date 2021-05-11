<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory()->createMany([
            ['name' => 'Businessmarketing'],
            ['name' => 'Organisatiekunde'],
            ['name' => 'Projectmanagement'],
            ['name' => 'Wachtrij theorie'],
            ['name' => 'Statistiek'],
            ['name' => 'ICT'],
            ['name' => 'Productiebesturing'],
            ['name' => 'Kwaliteitsbeheersing'],
            ['name' => 'Productie en magazijn logistiek'],
            ['name' => 'Discrete simulatie'],
            ['name' => 'Bedrijfseconomie en recht'],
        ]);

        Employee::all()->each(function ($employee) use ($courses) {
            $employee->courses()->attach($courses->random(rand(1, 3)));
        });
    }
}
