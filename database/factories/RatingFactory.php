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
            'rating' => rand(1, 5),
            'Company_id' => rand(56, 50),
        ];
    }
}
