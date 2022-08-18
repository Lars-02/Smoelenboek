<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\LearningLine;
use Illuminate\Database\Seeder;

class LearningLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $learningLines = LearningLine::factory()->createMany([
            ['name' => 'Onderzoeksvaardigheden'],
            ['name' => 'Academische taalvaardigheid'],
            ['name' => 'Algemene Vaardigheden'],
            ['name' => 'Klinische leerlijn'],
            ['name' => 'Onderzoeksmethodologie'],
            ['name' => 'Programmeervaardigheden'],
            ['name' => 'Vaardigheden in lesgeven'],
        ]);

        Employee::all()->each(function ($employee) use ($learningLines) {
            $employee->learningLines()->attach($learningLines->random(rand(1, 3)));
        });
    }
}
