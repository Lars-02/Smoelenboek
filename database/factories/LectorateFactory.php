<?php

namespace Database\Factories;

use App\Models\Lectorate;
use Illuminate\Database\Eloquent\Factories\Factory;

class LectorateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lectorate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(30)
        ];
    }
}
