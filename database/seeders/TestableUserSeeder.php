<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        //Testable User fully registered
        
        //Admin user
        DB::table('user')->insert([
            'email' => 'testableAdmin@avans.nl',
            'password' => bcrypt('password'),
        ]);
        $adminUser = User::where('email', 'testableAdmin@avans.nl')->first();
        RoleUser::factory()->create(['user_id' => $adminUser->id, 'role_id' => $admin->id]);
        
        $adminEmployee = Employee::factory()->create(['username' => 'testableAdmin', 'firstname' => 'admin', 'lastname' => 'admin',
        'phoneNumber' => '06555555', 'user_id' => $adminUser->id]);
        $adminEmployee->departments()->sync(['1']);
        $adminEmployee->expertises()->sync(['1']);
        $adminEmployee->workDays()->sync(['1', '2']);
        $adminEmployee->save();

        //Standard user
        DB::table('user')->insert([
            'email' => 'testableUser@avans.nl',
            'password' => bcrypt('password'),
        ]);
        $standardUser = User::where('email', 'testableUser@avans.nl')->first();
        RoleUser::factory()->create(['user_id' => $standardUser->id, 'role_id' => $teacher->id]);
        
        $standardEmployee = Employee::factory()->create(['username' => 'testableUser', 'firstname' => 'user', 'lastname' => 'user',
        'phoneNumber' => '06555554', 'user_id' => $standardUser->id]);
        $standardEmployee->departments()->sync(['1']);
        $standardEmployee->expertises()->sync(['1']);
        $standardEmployee->workDays()->sync(['1', '2']);
        $standardEmployee->save();
    }
}
