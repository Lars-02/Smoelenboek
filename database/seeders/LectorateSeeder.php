<?php

namespace Database\Seeders;

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
        Lectorate::factory()->create(['name' => 'Lectoraat Duurzame Bedrijfsvoering']);
        Lectorate::factory()->create(['name' => 'Lectoraat Reclassering en Veiligheidsbeleid']);
        Lectorate::factory()->create(['name' => 'Lectoraat Integrale Veiligheid']);
        Lectorate::factory()->create(['name' => 'Lectoraat Digitalisering en Veiligheid']);
        Lectorate::factory()->create(['name' => 'Lectoraat New Marketing']);
        Lectorate::factory()->create(['name' => 'Lectoraat Jeugd en Veiligheid']);
        Lectorate::factory()->create(['name' => 'Lectoraat Veiligheid, Openbare orde en Recht']);
        Lectorate::factory()->create(['name' => 'Lectoraat Professionaliteit van Beleid']);
        Lectorate::factory()->create(['name' => 'Lectoraat Leven Lang in Beweging']);
        Lectorate::factory()->create(['name' => 'Lectoraat Huiselijk geweld en hulpverlening in de keten']);
        Lectorate::factory()->create(['name' => 'Lectoraat Vermaatschappelijking in de zorg']);
    }
}
