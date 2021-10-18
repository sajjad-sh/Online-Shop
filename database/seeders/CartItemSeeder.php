<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartItem::create(['cart_id' => 13, 'product_id' => 76, 'quantity' => 1, 'price' => 25900000, 'multi_atts' => null]);
        CartItem::create(['cart_id' => 13, 'product_id' => 77, 'quantity' => 3, 'price' => 25900000, 'multi_atts' => null]);
        CartItem::create(['cart_id' => 13, 'product_id' => 78, 'quantity' => 3, 'price' => 25900000, 'multi_atts' => null]);
        CartItem::create(['cart_id' => 13, 'product_id' => 79, 'quantity' => 5, 'price' => 25900000, 'multi_atts' => null]);
        CartItem::create(['cart_id' => 13, 'product_id' => 80, 'quantity' => 2, 'price' => 25900000, 'multi_atts' => null]);
    }
}
