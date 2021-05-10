<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Lectorate;
use Illuminate\Database\Seeder;

class LectorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lectorates = Lectorate::factory()->createMany([
            ['name' => 'Lectoraat Duurzame Bedrijfsvoering'],
            ['name' => 'Lectoraat Reclassering en Veiligheidsbeleid'],
            ['name' => 'Lectoraat Integrale Veiligheid'],
            ['name' => 'Lectoraat Digitalisering en Veiligheid'],
            ['name' => 'Lectoraat New Marketing'],
            ['name' => 'Lectoraat Jeugd en Veiligheid'],
            ['name' => 'Lectoraat Veiligheid, Openbare orde en Recht'],
            ['name' => 'Lectoraat Professionaliteit van Beleid'],
            ['name' => 'Lectoraat Leven Lang in Beweging'],
            ['name' => 'Lectoraat Huiselijk geweld en hulpverlening in de keten'],
            ['name' => 'Lectoraat Vermaatschappelijking in de zorg'],
        ]);

        Employee::all()->each(function ($employee) use ($lectorates) {
            $employee->lectorates()->attach($lectorates->random(rand(1, 3)));
        });
    }
}
