<?php

use App\Http\Controllers\Admin\BannerCntroller;
use App\Http\Controllers\Admin\HoodieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Define routes for the web interface here. Group routes logically for 
| admin, frontend, and other functional modules.
|--------------------------------------------------------------------------
*/

// Admin Routes
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');

    Route::prefix('admin')->as('admin.')->group(function () {

       
        Route::prefix('hoodie')->as('hoodie.')->controller(HoodieController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'add')->name('add');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('delete');
        });

        // Route for Banner
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

Route::get('/', [FrontendController::class, 'index'])->name('home');

// frontend routes
Route::prefix('index')->as('index.')->controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});