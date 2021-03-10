<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeMinor;
use App\Models\Minor;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeMinorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeMinor::class;
    protected $currentId = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $minor = Minor::All()->count();
        $this->currentId++;

        return [
            'employee_id' => $this->currentId,
            'minor_id' => $this->faker->biasedNumberBetween($min = 1, $max = $minor)
        ];
    }
}
