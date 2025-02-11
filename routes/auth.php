<?php

// Import necessary controllers for authentication
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
// Import Laravel's built-in email verification request
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes (Accessible only when user is NOT logged in)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    
    // Show the registration form
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    // Handle registration form submission
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Show the login form
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    // Handle login form submission
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Show the forgot password request form
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    // Handle the request to send a password reset email
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    // Show the password reset form (user clicks the email reset link)
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    // Handle password reset submission
    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (Only accessible when user is logged in)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // Show the email verification notice if the user's email is not verified
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    // Handle email verification when user clicks the email link
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1']) // Ensures valid signature & rate limits requests
                ->name('verification.verify');

    // Resend the email verification notification
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1') // Prevents spamming the resend button
                ->name('verification.send');

    // Show the confirm password form (for sensitive actions like changing email)
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    // Handle confirm password submission
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Handle password update when logged in
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Logout the user
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
