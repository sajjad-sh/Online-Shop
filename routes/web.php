<?php

use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderByController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpecificationController;
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

require __DIR__ . '/auth.php';

Route::name('admin.')->prefix('admin')
    ->group(function () {
        Route::view('', 'admin.index')
            ->name('index');

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

                Route::resource('products', ProductController::class);
                Route::name('products.')->prefix('products')
                    ->group(function () {
                        Route::delete('{product}/delete', [ProductController::class, 'delete'])
                            ->name('delete');
                        Route::patch('{product}/restore', [ProductController::class, 'restore'])
                            ->name('restore');
                    });

                Route::resource('categories', CategoryController::class);

                Route::resource('specifications', SpecificationController::class);
                Route::name('specifications.')->prefix('specifications')
                    ->group(function () {
                        Route::get('create/t', [SpecificationController::class, 'createTitle'])
                            ->name('createTitle');
                        Route::post('t', [SpecificationController::class, 'storeTitle'])
                            ->name('storeTitle');
                        Route::delete('{specification}/t', [SpecificationController::class, 'destroyTitle'])
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

Route::get('/profile', function () {
    return view('user.profile');
})->middleware(['auth'])->name('profile');

Route::get('/', function () {
    return view('shop.home');
});

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

});
