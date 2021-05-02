<?php

namespace Database\Factories;

use App\Models\EmployeeHobby;
use App\Models\Hobby;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeHobbyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeHobby::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hobby = Hobby::All()->count();
        $this->currentId++;

        return [
            'employee_id' => $this->currentId,
            'hobby_id' => $this->faker->biasedNumberBetween($min = 1, $max = $hobby)
        ];
    }
}
