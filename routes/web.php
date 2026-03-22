<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\TaskController;
use App\Support\Toast;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

Route::get('/', function () {

    Toast::warning('Redirected to dashboard...');

    return redirect()->route('dashboard');
});

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

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('/categories', CategoryController::class)
        ->except(['show', 'create', 'edit'])
        ->middlewareFor(['update', 'destroy'], 'can:manage,category');

    Route::view('/settings', 'settings.index')->name('settings');

    Route::get('/tasks/all', [TaskController::class, 'index'])->name('tasks.all');
    Route::get('/tasks/todo', [TaskController::class, 'todo'])->name('tasks.todo');
    Route::get('/tasks/in-progress', [TaskController::class, 'inProgress'])->name('tasks.in-progress');
    Route::get('/tasks/completed', [TaskController::class, 'completed'])->name('tasks.completed');
    Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])
        ->name('tasks.toggle')
        ->middleware('can:manage,task');
    Route::resource('/tasks', TaskController::class)
        ->except(['index', 'create', 'edit', 'show'])
        ->middlewareFor(['update', 'destroy'], 'can:manage,task');

});
