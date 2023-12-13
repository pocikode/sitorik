<?php

use App\Http\Controllers\Admin\MotorcycleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Admin\BrandList;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('login', 'admin.pages.auth.login')
    ->name('login')
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::get('/brands', BrandList::class)->name('brands');

    Route::get('/motorcycles', [MotorcycleController::class, 'index'])->name('motorcycles');
    Route::get('/motorcycles/create', [MotorcycleController::class, 'create'])->name('motorcycles.create');
    Route::post('/motorcycles', [MotorcycleController::class, 'store']);
});


// Not Used
Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
