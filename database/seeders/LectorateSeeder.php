<?php

namespace Database\Seeders;

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
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Duurzame Bedrijfsvoering']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Reclassering en Veiligheidsbeleid']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Integrale Veiligheid']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Digitalisering en Veiligheid']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat New Marketing']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Jeugd en Veiligheid']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Veiligheid, Openbare orde en Recht']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Professionaliteit van Beleid']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Leven Lang in Beweging']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Huiselijk geweld en hulpverlening in de keten']);
        \App\Models\Lectorate::factory()->create(['name' => 'Lectoraat Vermaatschappelijking in de zorg']);
    }
}
