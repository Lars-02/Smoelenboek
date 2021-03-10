<?php

namespace Database\Seeders;

use App\Models\EmployeeMinor;
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
        RoleUser::factory()->times(20)->create();
    }
}
