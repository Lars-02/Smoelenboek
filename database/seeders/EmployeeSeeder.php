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
        \App\Models\Employee::factory()->times(18)->create(['department' => 'AII']);
        \App\Models\Employee::factory()->create(['department' => 'AFM']);
        \App\Models\Employee::factory()->create(['department' => 'AB&I']);
    }
}
