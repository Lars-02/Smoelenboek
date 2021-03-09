<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = array('Monday', 'Tuesday', 'Wednesday' ,'Thursday', 'Friday', 'Saturday', 'Sunday');
        for ($i = 1; $i <= 20; $i++){
            \App\Models\WorkHours::factory()->create(['employee_id' => $i, 'day' => $days[array_rand($days)]]);
        }
    }
}
