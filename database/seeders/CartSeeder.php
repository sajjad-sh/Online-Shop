<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '12000', 'net_price' => '12000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '13000', 'net_price' => '13000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '16000', 'net_price' => '16000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '65000', 'net_price' => '65000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '42000', 'net_price' => '42000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '87000', 'net_price' => '87000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '90000', 'net_price' => '90000']);
        Cart::create(['user_id' => 13, 'discount_ids' => null, 'total_price' => '66000', 'net_price' => '66000']);
    }
}
