<?php

namespace Database\Factories;

use App\Models\EmployeeLectorate;
use App\Models\Lectorate;
use App\Models\Minor;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeLectorateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeLectorate::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lectorate = Lectorate::All()->count();
        $this->currentId++;

        return [
            'employee_id' => $this->currentId,
            'lectorate_id' => $this->faker->biasedNumberBetween($min = 1, $max = $lectorate)
        ];
    }
}
