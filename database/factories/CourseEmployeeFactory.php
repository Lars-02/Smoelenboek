<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseEmployee;
use App\Models\Expertise;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseEmployee::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $course = Course::All()->count();
        $this->currentId++;

        return [
            'employee_id' => $this->currentId,
            'course_id' => $this->faker->biasedNumberBetween($min = 1, $max = $course)
        ];
    }
}
