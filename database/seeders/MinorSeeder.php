<?php

namespace Database\Seeders;

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
        Minor::factory()->create(['name' => 'Consultancy']);
        Minor::factory()->create(['name' => 'AII Minor Continu Verbeteren']);
        Minor::factory()->create(['name' => 'AII minor Data Science for Smart Industry']);
        Minor::factory()->create(['name' => 'AII Minor Data Science in Agrifood']);
        Minor::factory()->create(['name' => 'AII minor Emerging Technologies Playground']);
        Minor::factory()->create(['name' => 'Creating Sustainable Business Solutions']);
        Minor::factory()->create(['name' => 'Doorstroomminor Ethiek in Bedrijf en Organisatie (EBO)']);
        Minor::factory()->create(['name' => 'Doorstroomminor Human Resource Studies Tilburg University']);
        Minor::factory()->create(['name' => 'Doorstroomminor Information Management']);
        Minor::factory()->create(['name' => 'Doorstroomminor International Management']);
        Minor::factory()->create(['name' => 'Doorstroomminor Marketing Management']);
        Minor::factory()->create(['name' => 'Doorstroomminor Strategic Management']);
        Minor::factory()->create(['name' => 'Minor Management of Cultural Diversity Tilburg University']);
        Minor::factory()->create(['name' => 'Doorstroomminor Supply Chain Management']);
    }
}
