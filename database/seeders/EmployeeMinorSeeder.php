<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeMinor;
use App\Models\Minor;
use Illuminate\Database\Seeder;

class EmployeeMinorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeMinor::factory()->times(20)->create();
    }
}
