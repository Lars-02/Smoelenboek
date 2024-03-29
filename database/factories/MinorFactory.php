<?php

namespace Database\Factories;

use App\Models\Minor;
use Illuminate\Database\Eloquent\Factories\Factory;

class MinorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Minor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20)
        ];
    }
}
