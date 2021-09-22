<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cart_id' => $this->faker->randomNumber(),
            'address_id' => $this->faker->randomNumber(),
            'status' => $this->faker->numberBetween(0, 5),
            'payment_method' => $this->faker->numberBetween(0, 10),
            'cancel_reason' => $this->faker->unique()->text(),
        ];
    }
}
