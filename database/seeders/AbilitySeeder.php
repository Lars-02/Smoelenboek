<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ability::factory()->create(['name' => 'Create', 'label' => 'User can create a user']);
        \App\Models\Ability::factory()->create(['name' => 'Update', 'label' => 'User can update a user']);
        \App\Models\Ability::factory()->create(['name' => 'Delete', 'label' => 'User can delete users']);
        \App\Models\Ability::factory()->create(['name' => 'View', 'label' => 'User can view content']);
    }
}
