<?php

namespace Database\Factories;

use App\Models\EmployeeLearningLine;
use App\Models\LearningLine;
use App\Models\Lectorate;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeLearningLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeLearningLine::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $learningLine = LearningLine::All()->count();
        $this->currentId++;

        return [
            'employee_id' => $this->currentId,
            'learning_line_id' => $this->faker->biasedNumberBetween($min = 1, $max = $learningLine)
        ];
    }
}
