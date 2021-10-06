<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amazing_id' => $this->faker->randomNumber(),
            'fa_title' => $this->faker->title(),
            'en_title' => $this->faker->word(),
            'price' => $this->faker->numberBetween(0, 10),
            'inventory' => $this->faker->numberBetween(0, 10),
            'sales' => $this->faker->numberBetween(0, 10),
            'visits' => $this->faker->numberBetween(0, 10),
            'rate' => $this->faker->numberBetween(0, 10),
            'review' => $this->faker->realText(),
            'status' => $this->faker->numberBetween(0, 4),
        ];
    }
}
