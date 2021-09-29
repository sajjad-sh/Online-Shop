<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'product_id' => $this->faker->randomNumber(),
            'content' => $this->faker->realText(),
            'is_verify' => $this->faker->numberBetween(0, 2),
            'cancel_reason' => '',
            'likes' => $this->faker->numberBetween(0, 500),
            'dislikes' => $this->faker->numberBetween(0, 500)
        ];
    }
}
