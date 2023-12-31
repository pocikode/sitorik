<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MotorcycleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'pages.home')->name('home');

Route::get('/{brand_slug}_{slug}', [MotorcycleController::class, 'show'])->name('motorcycles.show');

Route::get('/berita', [ArticleController::class, 'index'])->name('articles');
Route::get('/berita/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
