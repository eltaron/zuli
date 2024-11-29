<?php

use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\OfferController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\SocialAuthController;
use App\Http\Controllers\Web\WishlistController;
use App\Models\Offer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Fortify::routes();
Route::group(['middleware' => 'Lang'], function () {
    Route::group(['namespace' => 'Web'], function () {
        // Basic Auth
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);

        // Password Management
        Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm']);
        Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.request');
        Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

        // Language
        Route::get('lang/{lang}', function ($lang) {
            session()->put('lang', $lang);
            return back()->with('success', 'language change successful');
        });

        Route::get('', [HomeController::class, 'index']);
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::post("contact", [HomeController::class, 'contact']);
        Route::get('/offers', [ProductController::class, 'offers'])->name('products');
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('/product/show/{id}', [ProductController::class, 'show']);
        Route::get('/categories', [ProductController::class, 'categories'])->name('categories');
        Route::get('/categories/show/{id}', [ProductController::class, 'showProductsInCategories'])->name('product.categories');
        Route::get('/top-products', [ProductController::class, 'showTopProducts'])->name('top.products');
        Route::middleware('auth')->group(function () {
            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
            Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
            Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
            Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
            Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
            Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
            Route::get('cart', [CartController::class, 'index'])->name('home');
            Route::get('wishlist', [WishlistController::class, 'index'])->name('home');
            Route::get('/dashboard', function () {
                if (auth()->check()) {
                    return redirect('cart');
                } else {
                    return redirect('login');
                }
            });
        });
    });
});
