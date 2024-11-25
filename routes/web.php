<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\SocialAuthController;
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
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Password Management
        Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
        Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

        // Email Verification
        Route::get('/email/verify', [AuthController::class, 'emailVerificationNotice'])->middleware('auth')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
        Route::post('/email/resend', [AuthController::class, 'resendEmailVerification'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

        // Social Login
        Route::get('/login/{provider}', [SocialAuthController::class, 'redirect'])->name('social.login');
        Route::get('/login/{provider}/callback', [SocialAuthController::class, 'callback']);

        // Language
        Route::get('lang/{lang}', function ($lang) {
            session()->put('lang', $lang);
            return back()->with('success', 'language change successful');
        });
        Route::middleware('auth')->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            });
        });
    });
});
