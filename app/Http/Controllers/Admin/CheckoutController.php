<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $cart_items = getCartItems()[0];
        $cart_items_counts = getCartItems()[1];
        $cart_count = getCartItems()[2];

        return view('shop.checkout', compact('cart_items', 'cart_items_counts', 'cart_count'));
    }
}
