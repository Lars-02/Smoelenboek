<?php

namespace Database\Factories;

use App\Models\EmployeeExpertise;
use App\Models\Expertise;
use App\Models\LearningLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeExpertiseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeExpertise::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $expertise = Expertise::All()->count();
        $this->currentId++;

        return [
            'employee_id' => $this->currentId,
            'expertise_id' => $this->faker->biasedNumberBetween($min = 1, $max = $expertise)
        ];
    }
}
