<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeExpertise;
use App\Models\Expertise;
use Illuminate\Database\Seeder;

class EmployeeExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeExpertise::factory()->times(20)->create();

    }
}
