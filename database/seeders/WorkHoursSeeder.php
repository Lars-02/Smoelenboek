<?php

namespace Database\Seeders;

use App\Models\WorkHours;
use Illuminate\Database\Seeder;

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
            WorkHours::factory()->create(['employee_id' => $i, 'day' => $days[array_rand($days)]]);
        }
    }
}
