<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
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
        \DB::table('user')->insert([
            'email' => 'test@avans.nl',
            'password' => bcrypt('password'),
        ]);

        \DB::table('employee')->insert([
            'username' => 'testuser',
            'user_id' => 21,
            'firstname' => 'test',
            'lastname' => 'user',
            'phoneNumber' => '06987476733',
            'department' => 'AI&I',
        ]);


        \DB::table('user')->insert([
            'email' => 'testAdmin@avans.nl',
            'password' => bcrypt('password'),
        ]);

        \DB::table('employee')->insert([
            'user_id' => 22,
        ]);

        $admin = Role::where('name', 'Admin')->first();
        RoleUser::factory()->create(['user_id' => 22, 'role_id' => $admin->id]);

        \DB::table('user')->insert([
            'email' => 'testDocent@avans.nl',
            'password' => bcrypt('password'),
        ]);

        \DB::table('employee')->insert([
            'user_id' => 23,
        ]);

        $teacher = Role::where('name', 'Docent')->first();
        RoleUser::factory()->create(['user_id' => 23, 'role_id' => $teacher->id]);
    }
}
