<?php

namespace Database\Seeders;

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
        LearningLine::factory()->create(['name' => 'Onderzoeksvaardigheden']);
        LearningLine::factory()->create(['name' => 'Academische taalvaardigheid']);
        LearningLine::factory()->create(['name' => 'Algemene Vaardigheden']);
        LearningLine::factory()->create(['name' => 'Klinische leerlijn']);
        LearningLine::factory()->create(['name' => 'Onderzoeksmethodologie']);
        LearningLine::factory()->create(['name' => 'Programmeervaardigheden']);
        LearningLine::factory()->create(['name' => 'Vaardigheden in lesgeven']);
    }
}
