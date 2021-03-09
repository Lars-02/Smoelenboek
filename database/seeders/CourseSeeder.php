<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Course::factory()->create(['name' => 'Businessmarketing']);
        \App\Models\Course::factory()->create(['name' => 'Organisatiekunde']);
        \App\Models\Course::factory()->create(['name' => 'Projectmanagement']);
        \App\Models\Course::factory()->create(['name' => 'Wachtrij theorie']);
        \App\Models\Course::factory()->create(['name' => 'Statistiek']);
        \App\Models\Course::factory()->create(['name' => 'ICT']);
        \App\Models\Course::factory()->create(['name' => 'Productiebesturing']);
        \App\Models\Course::factory()->create(['name' => 'Kwaliteitsbeheersing']);
        \App\Models\Course::factory()->create(['name' => 'Productie en magazijn logistiek']);
        \App\Models\Course::factory()->create(['name' => 'Discrete simulatie']);
        \App\Models\Course::factory()->create(['name' => 'Bedrijfseconomie en recht']);
    }
}
