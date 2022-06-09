<?php

namespace Database\Factories;

use App\Models\company;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Rating::class;

    public function definition()
    {
        return [
            'User_id' => rand(2, 32),
            'rating' => rand(1, 5),
            'Company_id' => rand(1, 3),
        ];
    }
}
