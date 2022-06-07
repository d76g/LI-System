<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $role = Role::class;
    public function definition()
    {
        return [
            // 'Role' => $this->faker->unique()->randomElement($array = array('Admin', 'Student', 'Supervisor')),

        ];
    }
}
