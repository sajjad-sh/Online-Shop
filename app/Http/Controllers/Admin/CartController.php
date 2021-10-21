<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart_count = $request->cookie('cart_count') ?: 0;
        $cart_items = json_decode($request->cookie('cart_items')) ?: [];

        $product_ids = array();
        foreach ($cart_items as $cart_item)
            $product_ids[] = $cart_item->item;

        $products = Product::query()->findMany($product_ids);

        return view('shop.cart', compact('products'));
    }

    /**
     * Add Product to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, Product $product, $count = 1)
    {
        $cart_count = $request->cookie('cart_count' ) ?: 0;
        $cart_items = json_decode($request->cookie('cart_items')) ?: [];

        if (!cart_item_exist($cart_items, $product))
            $cart_items[] = ['item' => $product->id, 'quantity' => $count, 'price' => $product->price,];
        else
            cart_item_inc($cart_items, $product, $count);

        $cart_count += $count;

        Cookie::queue('cart_items', json_encode($cart_items));
        Cookie::queue('cart_count', $cart_count);

        return redirect()->route('cart.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
