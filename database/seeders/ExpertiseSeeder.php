<?php

namespace Database\Seeders;

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
        Expertise::factory()->create(['name' => 'Leidinggeven']);
        Expertise::factory()->create(['name' => 'Communicatie en interactie']);
        Expertise::factory()->create(['name' => 'Flexibiliteit']);
        Expertise::factory()->create(['name' => 'Empatisch gedrag']);
        Expertise::factory()->create(['name' => 'Management']);
        Expertise::factory()->create(['name' => 'Organisatorisch']);
        Expertise::factory()->create(['name' => 'Oplossingsgericht']);
        Expertise::factory()->create(['name' => 'Behulpzaam']);
        Expertise::factory()->create(['name' => 'Samenwerking']);
        Expertise::factory()->create(['name' => 'Besluitvorming']);
    }
}
