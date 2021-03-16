<?php

namespace Database\Seeders;

use App\Models\Course;
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
        Course::factory()->create(['name' => 'Businessmarketing']);
        Course::factory()->create(['name' => 'Organisatiekunde']);
        Course::factory()->create(['name' => 'Projectmanagement']);
        Course::factory()->create(['name' => 'Wachtrij theorie']);
        Course::factory()->create(['name' => 'Statistiek']);
        Course::factory()->create(['name' => 'ICT']);
        Course::factory()->create(['name' => 'Productiebesturing']);
        Course::factory()->create(['name' => 'Kwaliteitsbeheersing']);
        Course::factory()->create(['name' => 'Productie en magazijn logistiek']);
        Course::factory()->create(['name' => 'Discrete simulatie']);
        Course::factory()->create(['name' => 'Bedrijfseconomie en recht']);
    }
}
