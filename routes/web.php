<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminAuthController;

Auth::routes();

Route::get('/tentang-kami', function () {return view('about');})->name('about');

// Custom login routes
Route::get('/', [CustomAuthController::class, 'showLoginForm'])->name('custom.login.form');

Route::post('/quick-login', [CustomAuthController::class, 'login'])->name('custom.login');
Route::post('/quick-logout', [CustomAuthController::class, 'logout'])->name('custom.logout');

// Protected dashboard route
Route::get('/dashboard', function () {return view('main.dashboard');})->middleware('auth')->name('dashboard');
Route::get('/dashboard/resepi', function () {return view('main.resepi');})->middleware('auth')->name('resepi');
Route::get('/dashboard/bahan-kering', function () {return view('main.bahan-kering');})->middleware('auth')->name('bahan-kering');


Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
        Route::put('/profile', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
    });
});