<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use DB;
use Illuminate\Database\Seeder;

class TestableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'email' => 'test@avans.nl',
            'password' => bcrypt('password'),
        ]);

        DB::table('user')->insert([
            'email' => 'testAdmin@avans.nl',
            'password' => bcrypt('password'),
        ]);

        $admin = Role::where('name', 'Admin')->first();
        RoleUser::factory()->create(['user_id' => 22, 'role_id' => $admin->id]);

        DB::table('user')->insert([
            'email' => 'testDocent@avans.nl',
            'password' => bcrypt('password'),
        ]);

        $teacher = Role::where('name', 'Docent')->first();
        RoleUser::factory()->create(['user_id' => 23, 'role_id' => $teacher->id]);
    }
}
