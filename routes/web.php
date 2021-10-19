<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderByController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\AttController;
use App\Http\Controllers\Shop\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
 * admin lte
 * spotty role permisson
 * spotty media library
 * verta
 * switty alert
 * auto slug
 * jscolor
 * rich text editor
 * shetabi payment
 * -------------------
 * amazing
 * categories, icon, counts
 * menu with cats
 * single product view
 * --------3-----------
 * add admin view
 *  confirmer
 * categories
 *  slider
 *  amazings
 * user profile
 *  updateFavorites
 */

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index']);

Route::name('admin.')->prefix('admin')
    ->group(function () {
        Route::get('', AdminController::class)
            ->middleware('auth')
            ->name('index');

//        Route::view('', 'admin.index')
//            ->middleware('auth')
//            ->name('index');

        Route::resource('users', UserController::class);
        Route::delete('users/{user}/delete', [UserController::class, 'delete'])
            ->name('users.delete');

        Route::resource('orders', OrderByController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('discounts', DiscountController::class);

        Route::name('shop.')->prefix('shop')
            ->group(function () {
                Route::view('', 'admin.shop.index')
                    ->name('index');

                Route::resource('products', ProductController::class)
                    ->except('show');

                Route::name('products.')->prefix('products')
                    ->group(function () {
                        Route::delete('{product}/delete', [ProductController::class, 'delete'])
                            ->name('delete');
                        Route::patch('{product}/restore', [ProductController::class, 'restore'])
                            ->name('restore');
                    });

                Route::resource('categories', CategoryController::class)
                    ->except('show');

                Route::resource('attributes', AttController::class);
                Route::name('attributes.')->prefix('attributes')
                    ->group(function () {
                        Route::get('create/t', [AttController::class, 'createTitle'])
                            ->name('createTitle');
                        Route::post('t', [AttController::class, 'storeTitle'])
                            ->name('storeTitle');
                        Route::delete('{attributes}/t', [AttController::class, 'destroyTitle'])
                            ->name('destroyTitle');
                    });

                Route::resource('comments', CommentController::class);
                Route::name('comments.')->prefix('comments')
                    ->group(function () {
                        Route::patch('{comment}/verify', [CommentController::class, 'verify'])
                            ->name('verify');
                        Route::patch('{comment}/unverify', [CommentController::class, 'unverify'])
                            ->name('unverify');
                    });
            });

        Route::name('site.')->prefix('site')
            ->group(function () {
                Route::view('', 'admin.site.index')
                    ->name('index');

                Route::resource('sliders', SlideController::class);
            });
    });

//Route::get('/profile', function () {
//    return view('user.profile');
//})->middleware(['auth'])->name('profile');

Route::resource('/profile', ProfileController::class)
    ->only(['index', 'update'])
    ->middleware(['auth']);

Route::patch('update-favorites/{user}', [UserController::class, 'updateFavorites'])
    ->name('updateFavorites')
    ->middleware(['auth']);

//Route::name('user.')->prefix('user')
//    ->group(function () {
//        Route::resource('profile2', ProfileController::class)
//            ->only(['index', 'update'])
//            ->middleware(['auth']);
//
//        Route::patch('update-favorites/{user}', [UserController::class, 'updateFavorites'])
//            ->name('updateFavorites')
//            ->middleware(['auth']);
//    });



Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])
->name('categories.show');;


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

    $category = \App\Models\Category::find(18);
    dd(\App\Models\Category::countCategoryParent($category));



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

//    dd($product->add_to_favorites);


});
