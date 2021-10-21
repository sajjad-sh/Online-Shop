<?php

use App\Models\Product;

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

function totalPrice($products) {
    $total_price = 0;

    foreach ($products as $product)
        $total_price += $product->price;

    return number_format($total_price);
}
