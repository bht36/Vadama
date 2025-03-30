<?php

use App\Http\Controllers\Admin\BannerCntroller;
use App\Http\Controllers\Admin\HoodieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Define routes for the web interface here. Group routes logically for 
| admin, frontend, and other functional modules.
|--------------------------------------------------------------------------
*/

// Admin Routes
// Route to show login form
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('admin.login');

// Route to handle login submission
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Route to handle logout
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Routes protected by authentication
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Route for Admin
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Admin profile edit route
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');

    // Admin Routes with a prefix 'admin'
    Route::prefix('admin')->as('admin.')->group(function () {

        // Routes for Hoodie Management
        Route::prefix('hoodie')->as('hoodie.')->controller(HoodieController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'add')->name('add');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('delete');
        });

        // Routes for Banner Management
        Route::prefix('banner')->as('banner.')->controller(BannerCntroller::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'add')->name('add');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('delete');
        });
    
    });
});

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');

// Frontend routes under 'index' prefix
Route::prefix('index')->as('index.')->controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/login', 'login')->name('login');
});