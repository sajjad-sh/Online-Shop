<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word(),
            'title' => $this->faker->word(),
            'type' => $this->faker->numberBetween(0, 1),
            'amount' => $this->faker->numberBetween(0, 1000),
            'inventory' => $this->faker->numberBetween(0, 1000),
            'sales' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
