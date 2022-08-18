<?php

namespace Database\Seeders;

use App\Models\Employee;
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
        $hobbies = Hobby::factory()->createMany([
            ['name' => 'Voetbal'],
            ['name' => 'Handbal'],
            ['name' => 'Volleybal'],
            ['name' => 'Gymnastiek'],
            ['name' => 'Turnen'],
            ['name' => 'Hardlopen'],
            ['name' => 'Zwemmen'],
            ['name' => 'Tennis'],
            ['name' => 'Badminton'],
            ['name' => 'Hengelsport'],
            ['name' => 'Hockey'],
            ['name' => 'Roeien'],
            ['name' => 'Zeilen'],
            ['name' => 'Watersport'],
            ['name' => 'Golf'],
            ['name' => 'Judo'],
            ['name' => 'Boksen'],
            ['name' => 'Wandelsport'],
            ['name' => 'Biljarten'],
            ['name' => 'Tafeltennis'],
            ['name' => 'Dammen'],
            ['name' => 'Bridgen'],
            ['name' => 'SjoelbakkenHonkbal'],
            ['name' => 'Basketbal'],
            ['name' => 'Korfbal'],
            ['name' => 'Kegelen'],
            ['name' => 'Rugby'],
            ['name' => 'Paardrijden'],
            ['name' => 'Schaatsen'],
            ['name' => 'Ijshockey'],
            ['name' => 'Skeeleren'],
            ['name' => 'Joggen'],
            ['name' => 'Fitness'],
            ['name' => 'Mediteren'],
            ['name' => 'Yoga'],
        ]);

        Employee::all()->each(function ($employee) use ($hobbies) {
            $employee->hobbies()->attach($hobbies->random(rand(1, 3)));
        });
    }
}
