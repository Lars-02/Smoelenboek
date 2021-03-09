<?php

namespace Database\Seeders;

use App\Models\Ability;
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
        Ability::factory()->create(['name' => 'Create', 'label' => 'User can create a user']);
        Ability::factory()->create(['name' => 'Update', 'label' => 'User can update a user']);
        Ability::factory()->create(['name' => 'Delete', 'label' => 'User can delete users']);
        Ability::factory()->create(['name' => 'View', 'label' => 'User can view content']);
    }
}
