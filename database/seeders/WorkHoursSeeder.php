<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\WorkHours;
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
        $data = DB::table('day_of_week')
            ->select('day_of_week.day as day')
            ->get();
        $days = [];

        foreach ($data as $item) {
            array_push($days,$item->day);
        }

        for ($i = 1; $i <= Employee::All()->count(); $i++){
            WorkHours::factory()->create(['employee_id' => $i, 'day' => $days[array_rand($days)]]);
        }
    }
}
