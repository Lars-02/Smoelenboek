<?php

namespace Database\Seeders;

use App\Models\LearningLine;
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
            AbilitySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            CourseSeeder::class,
            DepartmentSeeder::class,
            ExpertiseSeeder::class,
            HobbySeeder::class,
            LearningLineSeeder::class,
            LectorateSeeder::class,
            MinorSeeder::class,
            WorkDaySeeder::class,
        ]);
    }
}
