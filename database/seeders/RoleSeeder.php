<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create(['name' => 'Admin'])->abilities()->attach(Ability::all());

        Role::factory()->createMany([
            ['name' => 'Admin'],
            ['name' => 'Docent'],
            ['name' => 'Medewerker Administratie & Organisatie'],
            ['name' => 'Docent Management in de Zorg'],
            ['name' => 'Software Tester'],
            ['name' => 'Medewerker Multimedia Support'],
            ['name' => 'Senior Scrum Master'],
        ]);
    }
}
