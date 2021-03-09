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
        $roles = Role::paginate(5);
        $abilities = Ability::paginate(5);

        foreach ($roles as $role) {
            foreach ($abilities as $ability) {
                AbilityRole::firstOrCreate([
                    'role_id' => $role->id,
                    'ability_id' => $ability->id,
                ]);
            }
        }
    }
}
