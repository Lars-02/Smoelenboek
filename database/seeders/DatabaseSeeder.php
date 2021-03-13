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
        $this->call([
            HobbySeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            RoleSeeder::class,
            MinorSeeder::class,
            LectorateSeeder::class,
            LearningLineSeeder::class,
            ExpertiseSeeder::class,
            CourseSeeder::class,
            WorkHourSeeder::class,
            RoleUserSeeder::class,
            EmployeeMinorSeeder::class,
            EmployeeLectorateSeeder::class,
            EmployeeLearningLineSeeder::class,
            EmployeeHobbySeeder::class,
            EmployeeExpertiseSeeder::class,
            CourseEmployeeSeeder::class,
            AbilitySeeder::class,
            AbilityRoleSeeder::class]);
    }
}
