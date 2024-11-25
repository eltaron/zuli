<?php

use Illuminate\Http\Request;
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
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\FedbackController;
use App\Http\Controllers\Api\WorkController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SubServiceController;
use App\Http\Controllers\Api\SubServiceDetailController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\HomePageDetailController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderInstructionController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\PaymentTypeController;
use App\Http\Controllers\Api\SearchController;

Route::group(['namespace' => 'Api'], function () {
    Route::get('', function () {
        return response()->json(['message' => 'Welcome to the API'], 200);
    });
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('social-login', [AuthController::class, 'socialLogin']);
    Route::post('social-register', [AuthController::class, 'socialRegister']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::post('refresh-token', [AuthController::class, 'refreshToken']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('search', [SearchController::class, 'generalSearch']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', [AuthController::class, 'getUserData']);
        Route::put('user', [AuthController::class, 'updateUserData']);
        Route::put('change-password', [AuthController::class, 'changePassword']);
        Route::delete('delete-account', [AuthController::class, 'deleteAccount']);

        Route::apiResource('services', ServiceController::class);
        Route::apiResource('services.subservices', SubServiceController::class);
        Route::apiResource('subservices.subservicedetails', SubServiceDetailController::class);
        Route::apiResource('packages', PackageController::class);
        Route::apiResource('fedbacks', FedbackController::class);
        Route::apiResource('rates', RateController::class);
        Route::apiResource('wishlists', WishlistController::class);
        Route::apiResource('carts', CartController::class);
        Route::apiResource('languages', LanguageController::class);
        Route::apiResource('works', WorkController::class);
        Route::apiResource('partners', PartnerController::class);
        Route::apiResource('addresses', AddressController::class);
        Route::apiResource('homepagedetails', HomePageDetailController::class);
        Route::apiResource('orders', OrderController::class);
        Route::apiResource('order-instructions', OrderInstructionController::class);
        Route::apiResource('payment-types', PaymentTypeController::class);
        Route::apiResource('payment-methods', PaymentMethodController::class);
        // Add quantity to a cart item
        Route::patch('cart/{cartId}/add-quantity', [CartController::class, 'addQuantity']);
        // Remove quantity from a cart item
        Route::patch('cart/{cartId}/remove-quantity', [CartController::class, 'removeQuantity']);
    });
});
