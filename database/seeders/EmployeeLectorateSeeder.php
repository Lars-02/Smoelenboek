<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeLectorate;
use App\Models\Lectorate;
use Illuminate\Database\Seeder;

class EmployeeLectorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeLectorate::factory()->times(20)->create();
    }
}
