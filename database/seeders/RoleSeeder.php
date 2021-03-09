<?php

namespace Database\Seeders;

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
        \App\Models\Role::factory()->create(['name' => 'Admin']);
        \App\Models\Role::factory()->create(['name' => 'StandardUser']);
        \App\Models\Role::factory()->create(['name' => 'Medewerker Administratie & Organisatie']);
        \App\Models\Role::factory()->create(['name' => 'Docent Management in de Zorg']);
        \App\Models\Role::factory()->create(['name' => 'Software Tester']);
        \App\Models\Role::factory()->create(['name' => 'Medewerker Multimedia Support']);
        \App\Models\Role::factory()->create(['name' => 'Senior Scrum Master']);
        \App\Models\Role::factory()->create(['name' => 'Docent']);
    }
}
