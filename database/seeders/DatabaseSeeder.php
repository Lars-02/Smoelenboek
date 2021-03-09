<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\EmployeeLearningLine;
use App\Models\Lectorate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HobbySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(MinorSeeder::class);
        $this->call(LectorateSeeder::class);
        $this->call(LearningLineSeeder::class);
        $this->call(ExpertiseSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(WorkHoursSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(EmployeeMinorSeeder::class);
        $this->call(EmployeeLectorateSeeder::class);
        $this->call(EmployeeLearningLineSeeder::class);
        $this->call(EmployeeHobbySeeder::class);
        $this->call(EmployeeExpertiseSeeder::class);
        $this->call(CourseEmployeeSeeder::class);
        $this->call(AbilitySeeder::class);
        $this->call(AbilityRoleSeeder::class);
    }
}
