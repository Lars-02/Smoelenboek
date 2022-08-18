<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Expertise;
use Illuminate\Database\Seeder;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expertises = Expertise::factory()->createMany([
            ['name' => 'Leidinggeven'],
            ['name' => 'Communicatie en interactie'],
            ['name' => 'Flexibiliteit'],
            ['name' => 'Empatisch gedrag'],
            ['name' => 'Management'],
            ['name' => 'Organisatorisch'],
            ['name' => 'Oplossingsgericht'],
            ['name' => 'Behulpzaam'],
            ['name' => 'Samenwerking'],
            ['name' => 'Besluitvorming'],
        ]);

        Employee::all()->each(function ($employee) use ($expertises) {
            $employee->expertises()->attach($expertises->random(rand(1, 3)));
        });
    }
}
