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
        Department::factory()->create(['department' => 'AI&I']);
        Department::factory()->create(['department' => 'ASIS']);
        Department::factory()->create(['department' => 'AKV']);
        Department::factory()->create(['department' => 'AB&I']);
        Department::factory()->create(['department' => 'AGZ']);
        Department::factory()->create(['department' => 'PABO']);
        Department::factory()->create(['department' => 'AOC']);
        Department::factory()->create(['department' => 'LIC']);
        Department::factory()->create(['department' => 'AFM']);
    }
}
