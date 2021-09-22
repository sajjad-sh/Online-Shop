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
            'special_specifications' => json_encode([
                "نوع پنل" => "ips",
                "فرکانس" => "۵ هرتز",
                "نوع پردازنده" => "core i7",
                "اندازه صفحه نمایش" => "15.6 اینچ",
                "ظرفیت حافظه RAM" => "هشت گیگابایت",
                "نوع حافظه RAM" => "DDR4"
            ]),

//            'special_specifications' => json_encode([
//                $this->faker->randomElement(
//                    [
//                        "house",
//                        "flat",
//                        "apartment",
//                        "room", "shop",
//                        "lot", "garage"
//                    ]
//                )
//            ]),
            'status' => $this->faker->numberBetween(0, 4),
        ];
    }
}
