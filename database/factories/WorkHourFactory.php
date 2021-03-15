<?php

namespace Database\Factories;

use App\Models\WorkHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkHourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkHour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time()
        ];
    }
}
