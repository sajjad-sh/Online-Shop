<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderByController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('', AdminController::class)
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

Route::patch('update-favorites/{user}', [UserController::class, 'updateFavorites'])
    ->name('updateFavorites')
    ->middleware(['auth']);

Route::resource('cart', CartController::class)
    ->only(['index', 'update', 'destroy']);
Route::get('cart/add/{product}/{count}', [CartController::class, 'addProduct'])
    ->name('cart.addProduct');
