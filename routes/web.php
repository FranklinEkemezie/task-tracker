<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/dashboard');


Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post')
        ->middleware('throttle:login');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');

    Route::get('/forgot-password', [PasswordResetController::class, 'showPasswordResetRequestForm'])
        ->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendPasswordResetEmail'])
        ->middleware('throttle:password-reset-request')
        ->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showPasswordResetForm'])
        ->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
        ->middleware('throttle:password-reset')
        ->name('password.store');

    Route::view('/verify-email', 'auth.verify-email')
        ->name('verify-email');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/email/verify', [EmailVerificationController::class, 'index'])
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['signed', 'throttle:10,1'])
        ->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'send'])
        ->middleware(['throttle:5,1'])
        ->name('verification.send');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/dashboard', 'dashboard.overview')->name('dashboard');
    Route::view('/tasks/completed', 'dashboard.tasks-completed')->name('tasks.completed');
    Route::view('/tasks/in-progress', 'dashboard.tasks-in-progress')->name('tasks.in-progress');
    Route::view('/tasks/board', 'dashboard.task-board')->name('tasks.board');

});

