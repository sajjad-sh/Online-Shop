<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites;

        $favorite_products = Product::query()
            ->whereIn('id', $favorites)
            ->paginate(15);

        $cart_ids = [];
        $carts = Cart::query()->where('user_id', $user->id)->get('id')->toArray();
        foreach ($carts as $key => $array)
            $cart_ids[] = $array['id'];

        $orders = Order::query()
            ->whereIn('cart_id', $cart_ids)
            ->latest()->paginate(15);

        $comments = Comment::query()
            ->where('user_id', $user->id)
            ->latest()->paginate(15);

        $addresses = Address::query()
            ->where('user_id', $user->id)
            ->latest()->paginate(15);

        return view('user.profile')
            ->with('favorite_products', $favorite_products)
            ->with('orders', $orders)
            ->with('comments', $comments)
            ->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'email' => ['unique:users,email,' . $user->id],
            'phone' => ['min:11', 'max:13', 'regex:/^(\+98|0)?9\d{9}$/', 'unique:users,phone,' . $user->id]
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back();
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
