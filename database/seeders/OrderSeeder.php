<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Order::factory(50)->create();
        Order::create(['cart_id' => 13, 'address_id' => null, 'status' => 0, 'payment_method' => 0, 'cancel_reason' => 'ناموجود شده است']);
        Order::create(['cart_id' => 13, 'address_id' => null, 'status' => 1, 'payment_method' => 1, 'cancel_reason' => null]);
        Order::create(['cart_id' => 13, 'address_id' => null, 'status' => 2, 'payment_method' => 2, 'cancel_reason' => null]);
        Order::create(['cart_id' => 13, 'address_id' => null, 'status' => 3, 'payment_method' => 3, 'cancel_reason' => null]);
        Order::create(['cart_id' => 13, 'address_id' => null, 'status' => 4, 'payment_method' => 2, 'cancel_reason' => null]);
        Order::create(['cart_id' => 13, 'address_id' => null, 'status' => 5, 'payment_method' => 1, 'cancel_reason' => null]);

    }
}
