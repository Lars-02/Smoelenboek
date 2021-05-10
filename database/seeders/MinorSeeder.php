<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Minor;
use Illuminate\Database\Seeder;

class MinorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minors = Minor::factory()->createMany([
            ['name' => 'Consultancy'],
            ['name' => 'AII Minor Continu Verbeteren'],
            ['name' => 'AII minor Data Science for Smart Industry'],
            ['name' => 'AII Minor Data Science in Agrifood'],
            ['name' => 'AII minor Emerging Technologies Playground'],
            ['name' => 'Creating Sustainable Business Solutions'],
            ['name' => 'Doorstroomminor Ethiek in Bedrijf en Organisatie (EBO)'],
            ['name' => 'Doorstroomminor Human Resource Studies Tilburg University'],
            ['name' => 'Doorstroomminor Information Management'],
            ['name' => 'Doorstroomminor International Management'],
            ['name' => 'Doorstroomminor Marketing Management'],
            ['name' => 'Doorstroomminor Strategic Management'],
            ['name' => 'Minor Management of Cultural Diversity Tilburg University'],
            ['name' => 'Doorstroomminor Supply Chain Management'],
        ]);

        Employee::all()->each(function ($employee) use ($minors) {
            $employee->minors()->attach($minors->random(rand(1, 3)));
        });
    }
}
