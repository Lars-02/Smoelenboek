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
        $amountOfUsers = 20;
        for ($i = 1; $i <= $amountOfUsers; $i++){
             Employee::factory()->create(['user_id' => $i, 'department' => 'AI&I']);
        }
    }
}
