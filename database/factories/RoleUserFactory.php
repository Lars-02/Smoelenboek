<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoleUser::class;
    protected $currentId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = Role::All()->count();
        $this->currentId++;

        return [
            'user_id' => $this->currentId,
            'role_id' => $this->faker->biasedNumberBetween($min = 1, $max = $role)
        ];
    }
}
