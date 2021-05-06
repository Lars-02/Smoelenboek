<?php

namespace Database\Factories;

use App\Models\EmployeeWorkDay;
use App\Models\WorkDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeWorkDayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeWorkDay::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $workDay = WorkDay::All()->count();

        $this->currentId++;
        return [
            'employee_id' => $this->currentId,
            'work_day_id' => $this->faker->biasedNumberBetween($min = 1, $max = $workDay)
        ];
    }
}
