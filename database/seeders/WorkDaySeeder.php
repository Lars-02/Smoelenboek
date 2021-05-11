<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\WorkDay;
use Illuminate\Database\Seeder;

class WorkDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workDays = WorkDay::factory()->createMany([
            ['name' => 'Maandag'],
            ['name' => 'Dinsdag'],
            ['name' => 'Woensdag'],
            ['name' => 'Donderdag'],
            ['name' => 'Vrijdag'],
        ]);

        Employee::all()->each(function ($employee) use ($workDays) {
            $employee->workDays()->attach($workDays->random(rand(2, 5)));
        });
    }
}
