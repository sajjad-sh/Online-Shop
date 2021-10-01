<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

require __DIR__ . '/auth.php';


//Route::view('/', 'admin.index')
//    ->name('index');

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
    });
