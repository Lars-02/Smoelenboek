<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory()->create(['name' => 'AI&I']);
        Department::factory()->create(['name' => 'ASIS']);
        Department::factory()->create(['name' => 'AKV']);
        Department::factory()->create(['name' => 'AB&I']);
        Department::factory()->create(['name' => 'AGZ']);
        Department::factory()->create(['name' => 'PABO']);
        Department::factory()->create(['name' => 'AOC']);
        Department::factory()->create(['name' => 'LIC']);
        Department::factory()->create(['name' => 'AFM']);
    }
}
