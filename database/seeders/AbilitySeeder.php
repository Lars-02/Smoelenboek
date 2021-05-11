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
        Ability::factory()->createMany([
            ['name' => 'CreateEmployee', 'label' => 'User can create a new employee'],
            ['name' => 'CreateAdmin', 'label' => 'User can create a new admin'],
            ['name' => 'UpdateEmployee', 'label' => 'User can update employee'],
            ['name' => 'UpdateAdmin', 'label' => 'User can update admin'],
            ['name' => 'DeleteEmployee', 'label' => 'User can delete employee'],
            ['name' => 'ViewAdmin', 'label' => 'User can view admin'],
        ]);
    }
}
