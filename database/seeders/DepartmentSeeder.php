<?php

namespace Database\Seeders;

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
        \App\Models\Department::factory()->create(['department' => 'AI&I']);
        \App\Models\Department::factory()->create(['department' => 'ASIS']);
        \App\Models\Department::factory()->create(['department' => 'AKV']);
        \App\Models\Department::factory()->create(['department' => 'AB&I']);
        \App\Models\Department::factory()->create(['department' => 'AGZ']);
        \App\Models\Department::factory()->create(['department' => 'PABO']);
        \App\Models\Department::factory()->create(['department' => 'AOC']);
        \App\Models\Department::factory()->create(['department' => 'LIC']);
        \App\Models\Department::factory()->create(['department' => 'AFM']);
    }
}
