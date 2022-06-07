<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'User_id' => rand(2, 30),
            'content' => $this->faker->text,
            'Company_id' => rand(1, 3),
        ];
    }
}
