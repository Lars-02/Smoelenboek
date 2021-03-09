<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::factory()->times(10)->create(['department' => 'AII']);
        \App\Models\Employee::factory()->times(5)->create(['department' => 'AFM']);
        \App\Models\Employee::factory()->times(5)->create(['department' => 'AB&I']);
    }
}
