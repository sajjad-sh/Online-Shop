<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $cart_items = getCartItems()[0];
        $cart_items_counts = getCartItems()[1];
        $cart_count = getCartItems()[2];

        return view('shop.cart', compact('cart_items', 'cart_items_counts', 'cart_count'));
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

        return back();
//        return redirect()->route('cart.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $product = Product::query()->find($product_id);
        $old_quantity = 0;
        $new_quantity = $request->new_quantity;

        $cart_items = json_decode(request()->cookie('cart_items'), true) ?: [];
        $cart_count = $request->cookie('cart_count' ) ?: 0;

        if (cart_item_exist($cart_items, $product)) {
            foreach ($cart_items as $key => $subArr) {
                if($subArr['item'] == $product->id) {
                    $old_quantity = $cart_items[$key]['quantity'];
                    $cart_items[$key]['quantity'] = $new_quantity;
                }
            }
        }

        $dif = $new_quantity - $old_quantity;
        $cart_count += $dif;

        Cookie::queue('cart_items', json_encode($cart_items));
        Cookie::queue('cart_count', $cart_count);

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, $product_id)
    {
        $product = Product::query()->find($product_id);

        $cart_items = json_decode(request()->cookie('cart_items'), true) ?: [];
        $cart_count = $request->cookie('cart_count' ) ?: 0;
        $deleted_cart_item_counts = 0;

        if (cart_item_exist($cart_items, $product)) {
            foreach ($cart_items as $key => $subArr) {
                if($subArr['item'] == $product->id) {
                    $deleted_cart_item_counts = $subArr['quantity'];
                    unset($cart_items[$key]);
                }
            }
        }

        $cart_count -= $deleted_cart_item_counts;

        Cookie::queue('cart_items', json_encode($cart_items));
        Cookie::queue('cart_count', $cart_count);

        if($cart_count == 0)
            Cookie::queue(Cookie::forget('discount_ids'));

        return redirect()->route('cart.index');
    }

    public function applyDiscount(Request $request)
    {
        $cart_total_price = $request->cart_total_price;
        $discount_ids = json_decode($request->cookie('discount_ids')) ?: [];

        $discount = Discount::query()->where('code', $request->discount_code)->first();

        if(!is_null($discount)) {
            if(array_search($discount->id, $discount_ids) === false) {

                $discount_ids[] = $discount->id;

                if ($discount->type == 0)
                    $cart_total_price_discount = $cart_total_price - ($discount->amount / 100 * $cart_total_price);
                else
                    $cart_total_price_discount = $cart_total_price - $discount->amount;

//                Cookie::queue('price_discount', $cart_total_price_discount);
                Cookie::queue('discount_ids', json_encode($discount_ids));

                $message = ['success' => 'تبریک! کد تخفیف اعمال شد.'];

                if ($discount->inventory == 0)
                    $message = ['error' => 'موجودی این کد تخفیف به اتمام رسیده است.'];
            }
            else
                $message = ['error' => 'این کد تخفیف یک‌بار استفاده شده است.'];


        } else
            $message = ['error' => 'کد تخفیف نامعتبر است.'];

        return back()
            ->with('message', $message);
    }
}
