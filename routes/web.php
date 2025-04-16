<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BannerCntroller;
use App\Http\Controllers\Admin\HoodieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::middleware('guest')->group(function () {
    // Password reset request route (for the email form)
    Route::get('forgot-password', [ForgetPasswordController::class, 'forgetPassword'])->name('password.request');
    // Password reset email route (to send the reset link)
    Route::post('forgot-password', [ForgetPasswordController::class, 'sendResetLink'])->name('password.email');

    Route::get('reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');

    Route::post('reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');
});


// Frontend Routes
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/signup', 'signup')->name('signup');
    Route::get('/login', 'login')->name('login');
    Route::get('/forgetpassword', 'forgetpassword')->name('forgetpassword');
    Route::get('/forgetconfirmation', 'forgetconfirmation')->name('forgetconfirmation');
   
});

Route::controller(AccountController::class)->group(function () {
    Route::post('/user_info_store', 'user_info_store')->name('register_acc');
    Route::post('/login_seller_account', 'login_seller_account')->name('login_seller_account');
    Route::post('/seller_info_store', 'seller_info_store')->name('seller_info_store');
    Route::get('/login_seller', 'login_seller')->name('login_seller');
    Route::post('/login', 'user_info_login')->name('login_acc');
    Route::get('/register_seller', 'register_seller')->name('register_seller');
    
    // Authenticated routes (require auth:account middleware)
    Route::middleware(['auth:account'])->group(function () {
        Route::post('/logout', 'user_info_logout')->name('logout_acc');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/accountprofile', 'accountProfile')->name('accountprofile');
        Route::get('/editprofile', 'editprofile')->name('editprofile');
        Route::put('/update/{id}', 'update')->name('update'); // Update route
        Route::get('/leaseproperty', 'leaseProperty')->name('leaseproperty');
    });
});
// Route::controller(AccountController::class)->group(function () {
//     Route::post('/user_info_store', 'user_info_store')->name('register_acc');
//     Route::post('/login', 'user_info_login')->name('login_acc');
//     Route::post('/logout', 'user_info_logout')->name('logout_acc');
//     Route::get('/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
//     Route::get('/accountprofile', 'accountProfile')->middleware('auth')->name('accountprofile');
//     Route::get('/leaseproperty', 'leaseProperty')->middleware('auth')->name('leaseproperty');
// });