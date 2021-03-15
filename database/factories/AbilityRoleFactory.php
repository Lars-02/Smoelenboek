<?php

namespace Database\Factories;

use App\Models\Ability;
use App\Models\AbilityRole;
use App\Models\Course;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbilityRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AbilityRole::class;
    protected $roleId = 0;
    protected $abilityId = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->roleId++;
        $this->abilityId++;

        return [
            'ability_id' => $this->abilityId,
            'role_id' => $this->roleId
        ];
    }
}
