<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(100)->create();

        $roles = Role::all();

        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach($roles->random(rand(1, 3)));
        });

        User::factory()->create(['email' => 'admin@avans.nl'])->roles()->attach(Role::find(1));
        User::factory()->create(['email' => 'test@avans.nl'])->roles()->attach(Role::find(2));
    }
}
