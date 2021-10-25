<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $payments = Payment::paginate(15);

        return view('admin.payments.index')
            ->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        # TODO: use special validate for address
        $this->validate($request, [
//            'address' => 'integer',
//            'new_address' => 'min:10|max:255',
            'payment_method' => 'required|boolean'
        ]);

        $all = DB::transaction(function () use ($request) {

            $cart_items = getCartItems()[0];
            $cart_items_counts = getCartItems()[1];
            $cart_count = getCartItems()[2];
            $cart_items_price = getCartItems()[3];

            $discount_ids = json_decode(request()->cookie('discount_ids'));

            $netprice = cartTotalPriceWithoutDiscount($cart_items, $cart_items_counts);
            $total_price = cartTotalPriceAfterDiscount($netprice, $discount_ids);

            $cart = auth()->user()->carts()->create([
                'user_id' => auth()->user()->id,
                'discount_id' => json_encode($discount_ids),
                'count' => $cart_count,
                'total_price' => $total_price,
                'net_price' => $netprice,
            ]);

            $cart_id = $cart->id;



            foreach ($cart_items_counts as $product_id => $quantity) {
                $cart->cart_items()->create([
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'price' => $cart_items_price[$product_id],
                    'multi_atts' => null
                ]);
            }


            $address_id = $request->address;
            if($address_id == 'new') {
                $new_address_text = $request->new_address;
                $new_address = Address::create([
                    'user_id' => auth()->user()->id,
                    'content' => $new_address_text,
                    'location' => null,
                ]);
                $address_id = $new_address->id;
            }


            $order = Order::create([
                'cart_id' => $cart_id,
                'address_id' => $address_id,
                'status' => 3,
                'cancel_reason' => null
            ]);

            $payment = Payment::create([
                'user_id' => auth()->user()->id,
                'amount' => cartTotalPrice($cart_items, $cart_items_counts, false),
                'payment_method' => $request->payment_method
            ]);

            Cookie::queue(Cookie::forget('cart_items'));
            Cookie::queue(Cookie::forget('cart_count'));
            Cookie::queue(Cookie::forget('discount_ids'));

            return redirect()->route('cart.index')
                ->with('success_message', 'خرید شما با موفقیت انجام و سبد خرید خالی شد');
        });

        return redirect()->route('cart.index')
            ->with('payment_message', 'خرید شما با موفقیت انجام و سبد خرید خالی شد');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
