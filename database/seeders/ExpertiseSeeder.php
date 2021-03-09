<?php

namespace Database\Seeders;

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
        \App\Models\Expertise::factory()->create(['name' => 'Leidinggeven']);
        \App\Models\Expertise::factory()->create(['name' => 'Communicatie en interactie']);
        \App\Models\Expertise::factory()->create(['name' => 'Flexibiliteit']);
        \App\Models\Expertise::factory()->create(['name' => 'Empatisch gedrag']);
        \App\Models\Expertise::factory()->create(['name' => 'Management']);
        \App\Models\Expertise::factory()->create(['name' => 'Organisatorisch']);
        \App\Models\Expertise::factory()->create(['name' => 'Oplossingsgericht']);
        \App\Models\Expertise::factory()->create(['name' => 'Behulpzaam']);
        \App\Models\Expertise::factory()->create(['name' => 'Samenwerking']);
        \App\Models\Expertise::factory()->create(['name' => 'Besluitvorming']);
    }
}
