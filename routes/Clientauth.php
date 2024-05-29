<?php

use App\Http\Controllers\ClientAuth\AuthenticatedSessionController;
use App\Http\Controllers\ClientAuth\ConfirmablePasswordController;
use App\Http\Controllers\ClientAuth\EmailVerificationNotificationController;
use App\Http\Controllers\ClientAuth\EmailVerificationPromptController;
use App\Http\Controllers\ClientAuth\NewPasswordController;
use App\Http\Controllers\ClientAuth\PasswordController;
use App\Http\Controllers\ClientAuth\PasswordResetLinkController;
use App\Http\Controllers\ClientAuth\RegisteredClientController;
use App\Http\Controllers\ClientAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('Office/register', [RegisteredClientController::class, 'create'])
                ->name('office.register');

    Route::post('Office/register', [RegisteredClientController::class, 'store']);

    Route::get('Office/login', [AuthenticatedSessionController::class, 'create'])
                ->name('office.login');

    Route::post('Office/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('Office/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('office.password.request');

    Route::post('Office/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('office.password.email');

    Route::get('Office/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('office.password.reset');

    Route::post('Office/reset-password', [NewPasswordController::class, 'store'])
                ->name('office.password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('Office/verify-email', EmailVerificationPromptController::class)
                ->name('office.verification.notice');

    Route::get('Office/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('office.verification.verify');

    Route::post('Office/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('office.verification.send');

    Route::get('Office/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('office.password.confirm');

    Route::post('Office/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('Office/password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('Office/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('office.logout');
});

