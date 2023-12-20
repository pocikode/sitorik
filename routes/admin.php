<?php

use App\Http\Controllers\Admin\ArticleController;
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
    Route::get('/motorcycles/{motorcycle:slug}', [MotorcycleController::class, 'edit'])->name('motorcycles.edit');
    Route::put('/motorcycles/{motorcycle:slug}', [MotorcycleController::class, 'update']);
    Route::delete('/motorcycles/{motorcycle:slug}', [MotorcycleController::class, 'destroy'])->name('motorcycles.delete');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::get('/articles/{article:slug}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article:slug}', [ArticleController::class, 'update']);
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
