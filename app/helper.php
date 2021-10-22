<?php

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

function cart_item_exist(array $cart_items, Product $product)
{
    foreach ($cart_items as $cart_item) {
        foreach ($cart_item as $key => $value) {
            if ($key == 'item' and $product->id == $value)
                return true;
        }
    }
    return false;
}

function cart_item_inc(array &$cart_items, Product $product, $count)
{
    for ($i = 0; $i < count($cart_items); $i++) {
        foreach ($cart_items[$i] as $key => $value) {
            if ($key == 'item' and $product->id == $value) {
                $cart_items[$i]->quantity += $count;
                return $count;
            }
        }
    }
}

function cartTotalPriceWithoutDiscount($cart_products, $cart_items_counts) {
    $cart_total_price = 0;

    foreach ($cart_products as $product)
        $cart_total_price += $product->total_price * $cart_items_counts[$product->id];

    return $cart_total_price ;
}


function cartTotalPrice($cart_products, $cart_items_counts, $number_format = true) {

    if(request()->cookie('discount_ids')) {
        $cart_total_price_without_discount = cartTotalPriceWithoutDiscount($cart_products, $cart_items_counts);
        $discount_ids = json_decode(request()->cookie('discount_ids'));

        return $number_format ? number_format(cartTotalPriceAfterDiscount($cart_total_price_without_discount, $discount_ids)) : cartTotalPriceAfterDiscount($cart_total_price_without_discount, $discount_ids);
    }

    return $number_format ? number_format(cartTotalPriceWithoutDiscount($cart_products, $cart_items_counts)) : cartTotalPriceWithoutDiscount($cart_products, $cart_items_counts);
}

function getCartItems() {
    $cart_count = request()->cookie('cart_count') ?: 0;
    $cart_items = json_decode(request()->cookie('cart_items')) ?: [];

    $cart_item_ids = array();
    $cart_items_counts = array();
    foreach ($cart_items as $cart_item) {
        $cart_item_ids[] = $cart_item->item;
        $cart_items_counts[$cart_item->item] = $cart_item->quantity;
    }

    $cart_items = Product::query()->findMany($cart_item_ids);

    return [$cart_items, $cart_items_counts, $cart_count];
}

function cartTotalPriceAfterDiscount($cart_total_price, $discount_ids) {

    $discounts = Discount::query()->findMany($discount_ids);

    if(!is_null($discounts)) {
        foreach ($discounts as $discount) {
            if ($discount->type == 0)
                $cart_total_price_discount = $cart_total_price - ($discount->amount / 100 * $cart_total_price);
            else
                $cart_total_price_discount = $cart_total_price - $discount->amount;
        }
    }
    return $cart_total_price_discount;
}
