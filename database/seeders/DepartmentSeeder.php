<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::factory()->createMany([
            ['name' => 'AI&I'],
            ['name' => 'ASIS'],
            ['name' => 'AKV'],
            ['name' => 'AB&I'],
            ['name' => 'AGZ'],
            ['name' => 'PABO'],
            ['name' => 'AOC'],
            ['name' => 'LIC'],
            ['name' => 'AFM'],
            ]);

        Employee::all()->each(function ($employee) use ($departments) {
            $employee->departments()->attach($departments->random(rand(1, 3)));
        });
    }
}
