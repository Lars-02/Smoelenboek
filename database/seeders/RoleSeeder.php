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
            ['name' => 'Docent', 'self_assignable' => true],
            ['name' => 'Medewerker Administratie & Organisatie', 'self_assignable' => true],
            ['name' => 'Docent Management in de Zorg', 'self_assignable' => true],
            ['name' => 'Software Tester', 'self_assignable' => true],
            ['name' => 'Medewerker Multimedia Support', 'self_assignable' => true],
            ['name' => 'Senior Scrum Master', 'self_assignable' => true],
        ]);
    }
}
