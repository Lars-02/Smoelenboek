<?php

namespace Database\Seeders;

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
        Role::factory()->create(['name' => 'Admin']);
        Role::factory()->create(['name' => 'StandardUser']);
        Role::factory()->create(['name' => 'Medewerker Administratie & Organisatie']);
        Role::factory()->create(['name' => 'Docent Management in de Zorg']);
        Role::factory()->create(['name' => 'Software Tester']);
        Role::factory()->create(['name' => 'Medewerker Multimedia Support']);
        Role::factory()->create(['name' => 'Senior Scrum Master']);
        Role::factory()->create(['name' => 'Docent']);
    }
}
