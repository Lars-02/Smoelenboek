<?php

namespace Database\Seeders;

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
        \App\Models\Minor::factory()->create(['name' => 'Consultancy']);
        \App\Models\Minor::factory()->create(['name' => 'AII Minor Continu Verbeteren']);
        \App\Models\Minor::factory()->create(['name' => 'AII minor Data Science for Smart Industry']);
        \App\Models\Minor::factory()->create(['name' => 'AII Minor Data Science in Agrifood']);
        \App\Models\Minor::factory()->create(['name' => 'AII minor Emerging Technologies Playground']);
        \App\Models\Minor::factory()->create(['name' => 'Creating Sustainable Business Solutions']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor Ethiek in Bedrijf en Organisatie (EBO)']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor Human Resource Studies Tilburg University']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor Information Management']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor International Management']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor Marketing Management']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor Strategic Management']);
        \App\Models\Minor::factory()->create(['name' => 'Minor Management of Cultural Diversity Tilburg University']);
        \App\Models\Minor::factory()->create(['name' => 'Doorstroomminor Supply Chain Management']);
    }
}
