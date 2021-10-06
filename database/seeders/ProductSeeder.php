<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(50)->create();
        $categoires = Category::all();

        Product::all()->each(function ($product) use ($categoires) {
            $product->categories()->attach(
                $categoires->random(rand(1, 43))->pluck('id')->toArray()
            );
        });
    }
}
