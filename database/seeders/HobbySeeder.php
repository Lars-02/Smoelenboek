<?php

namespace Database\Seeders;

use App\Models\Hobby;
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
        Hobby::factory()->create(['name' => 'Voetbal']);
        Hobby::factory()->create(['name' => 'Handbal']);
        Hobby::factory()->create(['name' => 'Volleybal']);
        Hobby::factory()->create(['name' => 'Gymnastiek']);
        Hobby::factory()->create(['name' => 'Turnen']);
        Hobby::factory()->create(['name' => 'Hardlopen']);
        Hobby::factory()->create(['name' => 'Zwemmen']);
        Hobby::factory()->create(['name' => 'Tennis']);
        Hobby::factory()->create(['name' => 'Badminton']);
        Hobby::factory()->create(['name' => 'Hengelsport']);
        Hobby::factory()->create(['name' => 'Hockey']);
        Hobby::factory()->create(['name' => 'Roeien']);
        Hobby::factory()->create(['name' => 'Zeilen']);
        Hobby::factory()->create(['name' => 'Watersport']);
        Hobby::factory()->create(['name' => 'Golf']);
        Hobby::factory()->create(['name' => 'Judo']);
        Hobby::factory()->create(['name' => 'Boksen']);
        Hobby::factory()->create(['name' => 'Wandelsport']);
        Hobby::factory()->create(['name' => 'Biljarten']);
        Hobby::factory()->create(['name' => 'Tafeltennis']);
        Hobby::factory()->create(['name' => 'Dammen']);
        Hobby::factory()->create(['name' => 'Bridgen']);
        Hobby::factory()->create(['name' => 'SjoelbakkenHonkbal']);
        Hobby::factory()->create(['name' => 'Basketbal']);
        Hobby::factory()->create(['name' => 'Korfbal']);
        Hobby::factory()->create(['name' => 'Kegelen']);
        Hobby::factory()->create(['name' => 'Rugby']);
        Hobby::factory()->create(['name' => 'Paardrijden']);
        Hobby::factory()->create(['name' => 'Schaatsen']);
        Hobby::factory()->create(['name' => 'Ijshockey']);
        Hobby::factory()->create(['name' => 'Skeeleren']);
        Hobby::factory()->create(['name' => 'Joggen']);
        Hobby::factory()->create(['name' => 'Fitness']);
        Hobby::factory()->create(['name' => 'Mediteren']);
        Hobby::factory()->create(['name' => 'Yoga']);
    }
}
