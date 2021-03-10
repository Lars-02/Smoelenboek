<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            User::factory()->create(['employee_id' => $i]);
        }
    }
}
