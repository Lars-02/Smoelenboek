<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeHobby;
use App\Models\Hobby;
use Illuminate\Database\Seeder;

class EmployeeHobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hobbies = Hobby::paginate(5);
        $employees = Employee::paginate(5);

        foreach ($hobbies as $hobbie) {
            foreach ($employees as $employee) {
                EmployeeHobby::firstOrCreate([
                    'hobby_id' => $hobbie->id,
                    'employee_id' => $employee->id,
                ]);
            }
        }

    }
}
