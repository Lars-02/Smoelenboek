<?php

namespace Database\Seeders;

use App\Models\EmployeeWorkDay;
use Illuminate\Database\Seeder;

class EmployeeWorkDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeWorkDay::factory()->times(20)->create();
    }
}
