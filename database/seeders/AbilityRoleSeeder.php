<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Role;
use App\Models\AbilityRole;
use Illuminate\Database\Seeder;

class AbilityRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AbilityRole::factory()->times(Ability::All()->count())->create();
    }
}
