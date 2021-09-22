<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\OrderByController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin', [AdminController::class, 'index'])
    ->name('admin.index');
Route::get('admin/users', [UserController::class, 'index'])
    ->name('admin.users.index');
Route::delete('admin/users/{user}', [UserController::class, 'destroy'])
    ->name('admin.users.destroy');
Route::delete('admin/users/{user}/force', [UserController::class, 'forceDelete'])
    ->name('admin.users.forceDelete');
Route::patch('admin/users/{user}', [UserController::class, 'update'])
    ->name('admin.users.update');


Route::get('admin/orders', [OrderByController::class, 'index'])
    ->name('admin.orders.index');
Route::patch('admin/orders/{order}', [OrderByController::class, 'update'])
    ->name('admin.orders.update');

Route::get('admin/payments', [PaymentController::class, 'index'])
    ->name('admin.payments.index');

Route::get('admin/discounts', [DiscountController::class, 'index'])
    ->name('admin.discounts.index');

Route::get('admin/shop', [ShopController::class, 'index'])
    ->name('admin.shop.index');

Route::get('admin/shop/products', [ProductController::class, 'index'])
    ->name('admin.shop.products.index');
Route::delete('admin/shop/products/{product}', [ProductController::class, 'destroy'])
    ->name('admin.shop.products.destroy');
Route::delete('admin/shop/products/{product}/force', [ProductController::class, 'forceDelete'])
    ->name('admin.shop.products.forceDelete');
Route::patch('admin/shop/products/{product}/restore', [ProductController::class, 'restore'])
    ->name('admin.shop.products.restore');
Route::get('admin/shop/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('admin.shop.products.edit');
Route::patch('admin/shop/products/{product}', [ProductController::class, 'update'])
    ->name('admin.shop.products.update');


Route::get('/test', function () {
    Product::query()->update(
        ['special_specifications' => json_encode([
            "نوع پنل" => "ips",
            "فرکانس" => "۵ هرتز",
            "نوع پردازنده" => "core i7",
            "اندازه صفحه نمایش" => "15.6 اینچ",
            "ظرفیت حافظه RAM" => "هشت گیگابایت",
            "نوع حافظه RAM" => "DDR4"
        ])]);
});
