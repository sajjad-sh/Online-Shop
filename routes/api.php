<?php

use App\Http\Controllers\API\AttController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\DiscountController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SlideController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * User API Routes
 */

# Home
Route::get('home', HomeController::class);

//Route::apiResources([
//    'categories' => CategoryController::class
//]);

# Categories
Route::apiResource('categories', CategoryController::class)->except('show');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');


# Products
Route::apiResource('products', ProductController::class)->except('show');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::name('products.')->prefix('products')
    ->group(function () {
        Route::delete('{product}/delete', [ProductController::class, 'delete'])->name('delete');
        Route::patch('{product}/restore', [ProductController::class, 'restore'])->name('restore');
    });


# Profile
Route::apiResource('profile', App\Http\Controllers\API\ProfileController::class)
    ->only(['index', 'update']);


/**
 * Admin API Routes
 */

#

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::apiResource('users', UserController::class);
        Route::delete('users/{user}/delete', [UserController::class, 'delete'])
            ->name('users.delete');

        Route::resource('orders', OrderController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('discounts', DiscountController::class);

        Route::name('shop.')->prefix('shop')
            ->group(function () {
                Route::apiResource('attributes', AttController::class);
                Route::name('attributes.')->prefix('attributes')
                    ->group(function () {
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

        Route::resource('sliders', SlideController::class);
    });

Route::patch('update-favorites/{user}', [UserController::class, 'updateFavorites'])
    ->name('updateFavorites');

//Route::resource('cart', CartController::class)
//    ->only(['index', 'update', 'destroy']);
//Route::get('cart/add/{product}/{count}', [CartController::class, 'addProduct'])
//    ->name('cart.addProduct');
//Route::post('cart/discount/', [CartController::class, 'applyDiscount'])
//    ->name('cart.applyDiscount');
