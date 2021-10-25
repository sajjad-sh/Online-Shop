<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('/profile', ProfileController::class)
    ->only(['index', 'update'])
    ->middleware(['auth']);

Route::get('/product/{product:slug}', [ProductController::class, 'show']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('checkout', CheckoutController::class)
    ->middleware('auth')
    ->name('checkout');

Route::resource('payments', PaymentController::class)->except('index');
