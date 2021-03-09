<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::paginate(5);
        $user = User::paginate(5);

        foreach ($user as $user) {
            foreach ($roles as $role) {
                RoleUser::firstOrCreate([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                ]);
            }
        }
    }
}
