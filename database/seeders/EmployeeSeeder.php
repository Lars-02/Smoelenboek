<?php

namespace Database\Seeders;

use App\Models\Employee;
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
        Employee::factory()->times(10)->create(['department' => 'AI&I']);
        Employee::factory()->times(5)->create(['department' => 'AFM']);
        Employee::factory()->times(5)->create(['department' => 'AB&I']);
    }
}
