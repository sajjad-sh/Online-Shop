<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# TODO: s Plural ?
# TODO: Select best route Structure
# TODO: use except and only for Resource routes after complete crud
# TODO: Multiple routes files ?

/*
 *
 * which packages ?
 * intervention
 * spotty media library
 * verta
 * switty alert
 * rich text editor
 * shetabi payment
 */

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';


Route::get('/test', function () {
//    Storage::disk('local')->put('example.txt', 'Contents');
//    Storage::put('avatars/1', '1');
//    <img src="{{ \Storage::url($task->image) }}" class="img-thumbnail">
//        Storage::put('store.html','<h1>Test Store</h1>');
//        $isExist = Storage::exists('store.html');
//        $isExist = Storage::missing('store.html');
//        $isExist = Storage::disk('public')->exists('store.html');
//        dd($isExist);
//    if ($request->hasFile('file')) {
//            $ext = $request->file('file')->getClientOriginalExtension();
//        $name = $request->file('file')->getClientOriginalName();
//            return $request->file('file')->store('/test_public');
//        $path = $request->file('file')->storeAs('/images',$name);
//    }
//    File::create([
//        'name'=>$name,
//        File::PATH=>$path
//    ]);
//    return back()->with('status','file saved');

//    dd(Storage::get('/storage/categories/icons/cat-8.jpg'));

//    dd(\App\Models\Category::countCategoryParent(\App\Models\Category::find(12)));

//    $c = \App\Models\Category::find(1);
//    (\App\Models\Category::hasChildren($c));
//
//    dd(\App\Models\Category::hasChildren($c));

//    $category = \App\Models\Category::find(18);
//    dd(\App\Models\Category::countCategoryParent($category));

//    $categories = \App\Models\Category::all();
//    dd($categories[1]->image);

//    $products = \App\Models\Product::all();
//
//    foreach ($products as $product) {
//        $pid = $product->id;
//        $product->slug = 'prd-'.$pid;
//        $product->save();
//    }

//    $product = \App\Models\Product::find(76);
//    dd($product->attributes);

//    $product = \App\Models\Product::find(76);
//    dd($product->related_products);
//    dd($product->categories->toarray());

//    $products = \App\Models\Product::query()->find([76, 77, 78]);
//    dd($products);

//    dd($product->primary_attributes);

//    dd($product->selective_attributes);

//    dd(__('numbers.0'));

//\App\Models\Product::getLastInsertedId();
//    $subcategories = $category->childrens;
//
//    if($subcategories->count()>5)
//        $subcategories = $subcategories->random(5);
//
//    $products = array();
//
//    $i=0;
//    foreach ($subcategories as $subcategory) {
//        $n = $subcategory->products->count();
//
//        if($n<5)
//            $products[$i] = $subcategory->products;
//        else
//            $products[$i] = $subcategory->products->random(5);
//
//        $i++;
//    }
//    dd(auth()->user()->carts);


//    $orders = auth()->user()->orders;
//    dd($orders);
//    foreach ($orders as $order) {
//        dump($order->cart_id);
//        dd($order->cart);
//        dd($order->cart->cart_items);
//    }
//    $user = auth()->user()->id;
//    dd($user);

//    dd($product->add_to_favori
//tes);
//    Response::
    /*
     * [{"item":6679984,"quantity":1,"price":13990000},{"item":2052290,"quantity":1,"price":1895000}]
     */

//
//
//    $cart_count = 0;
//    $cart_items = [];
//
//    if (!(request()->cookie('cart_count')))
//        Cookie::queue('cart_count', $cart_count, 7 * 24 * 60 * 60);
//
//    if (!(request()->cookie('cart_items')))
//        Cookie::queue('cart_items', json_encode($cart_items), 7 * 24 * 60 * 60);

//
//    $cart_items = json_decode(request()->cookie('cart_items'), true) ?: [];
//
//    foreach ($cart_items as $key => $subArr) {
//        if($subArr['item'] == 77 )
//            unset($cart_items[$key]);
//    }
//    dd($cart_items);


    $discount = \App\Models\Discount::query()->where('code', 'wisnter')->first();

    dd($discount);
    if(\Illuminate\Support\Collection::empty($discount))
        $discount = false;


});
