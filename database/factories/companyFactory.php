<?php

namespace Database\Factories;

use App\Models\company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class companyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = company::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'eco_sector' => $this->faker->randomElement($array = array('Public', 'Private')),
            'sector' => $this->faker->randomElement($array = array('Software', 'AI')),
            'email' => Str::random(10) . '@edu.com',
            'phone_number' => $this->faker->phoneNumber,
            'image_path' => $this->faker->image,
        ];
    }
}
