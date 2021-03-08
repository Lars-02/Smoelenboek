<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Hobby::factory()->create(['name' => 'Voetbal']);
        \App\Models\Hobby::factory()->create(['name' => 'Handbal']);
        \App\Models\Hobby::factory()->create(['name' => 'Volleybal']);
        \App\Models\Hobby::factory()->create(['name' => 'Gymnastiek']);
        \App\Models\Hobby::factory()->create(['name' => 'Turnen']);
        \App\Models\Hobby::factory()->create(['name' => 'Hardlopen']);
        \App\Models\Hobby::factory()->create(['name' => 'Zwemmen']);
        \App\Models\Hobby::factory()->create(['name' => 'Tennis']);
        \App\Models\Hobby::factory()->create(['name' => 'Badminton']);
        \App\Models\Hobby::factory()->create(['name' => 'Hengelsport']);
        \App\Models\Hobby::factory()->create(['name' => 'Hockey']);
        \App\Models\Hobby::factory()->create(['name' => 'Roeien']);
        \App\Models\Hobby::factory()->create(['name' => 'Zeilen']);
        \App\Models\Hobby::factory()->create(['name' => 'Watersport']);
        \App\Models\Hobby::factory()->create(['name' => 'Golf']);
        \App\Models\Hobby::factory()->create(['name' => 'Judo']);
        \App\Models\Hobby::factory()->create(['name' => 'Boksen']);
        \App\Models\Hobby::factory()->create(['name' => 'Wandelsport']);
        \App\Models\Hobby::factory()->create(['name' => 'Biljarten']);
        \App\Models\Hobby::factory()->create(['name' => 'Tafeltennis']);
        \App\Models\Hobby::factory()->create(['name' => 'Dammen']);
        \App\Models\Hobby::factory()->create(['name' => 'Bridgen']);
        \App\Models\Hobby::factory()->create(['name' => 'SjoelbakkenHonkbal']);
        \App\Models\Hobby::factory()->create(['name' => 'Basketbal']);
        \App\Models\Hobby::factory()->create(['name' => 'Korfbal']);
        \App\Models\Hobby::factory()->create(['name' => 'Kegelen']);
        \App\Models\Hobby::factory()->create(['name' => 'Rugby']);
        \App\Models\Hobby::factory()->create(['name' => 'Paardrijden']);
        \App\Models\Hobby::factory()->create(['name' => 'Schaatsen']);
        \App\Models\Hobby::factory()->create(['name' => 'Ijshockey']);
        \App\Models\Hobby::factory()->create(['name' => 'Skeeleren']);
        \App\Models\Hobby::factory()->create(['name' => 'Joggen']);
        \App\Models\Hobby::factory()->create(['name' => 'Fitness']);
        \App\Models\Hobby::factory()->create(['name' => 'Mediteren']);
        \App\Models\Hobby::factory()->create(['name' => 'Yoga']);
    }
}
