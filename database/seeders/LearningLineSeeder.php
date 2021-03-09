<?php

namespace Database\Seeders;

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
        \App\Models\LearningLine::factory()->create(['name' => 'Onderzoeksvaardigheden']);
        \App\Models\LearningLine::factory()->create(['name' => 'Academische taalvaardigheid']);
        \App\Models\LearningLine::factory()->create(['name' => 'Algemene Vaardigheden']);
        \App\Models\LearningLine::factory()->create(['name' => 'Klinische leerlijn']);
        \App\Models\LearningLine::factory()->create(['name' => 'Onderzoeksmethodologie']);
        \App\Models\LearningLine::factory()->create(['name' => 'Programmeervaardigheden']);
        \App\Models\LearningLine::factory()->create(['name' => 'Vaardigheden in lesgeven']);
    }
}
