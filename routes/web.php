<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BannerCntroller;
use App\Http\Controllers\Admin\HoodieController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyRentController;
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
        Route::prefix('site_setting')->as('site_setting.')->controller(SiteSettingController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
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
    Route::get('/aboutus', 'aboutus')->name('aboutus');
    Route::get('/housinglist', 'housingList')->name('housing.list');

    Route::get('/housing/{id}','housing')->name('housing');
    Route::get('/searchlist','searchlist')->name('searchlist');   
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

        Route::post('/property_upload', 'property_upload')->name('property_upload');
        Route::get('/view_leaseproperty', 'view_leaseproperty')->name('view_leaseproperty');
        Route::get('/property_edit/{id}', 'property_edit')->name('property_edit');
        Route::put('/property_update/{id}', 'property_update')->name('property_update');
        Route::delete('/property_destroy/{id}', 'property_destroy')->name('property_destroy');
    });
    });
    
    Route::middleware('auth:account')->controller(PropertyRentController::class)->group(function () {
        // Rental Requests
        Route::prefix('rental-requests')->name('rental-requests.')->group(function () {
            Route::post('/', 'storeRentalRequest')->name('store');
            // Route::get('/view_requestproperty', 'view_requestproperty')->name('view_requestproperty');
            // Route::get('/', 'indexRentalRequests')->name('index');
            // Route::put('/{id}', 'updateRentalRequest')->name('update');
            // Route::delete('/{id}', 'destroyRentalRequest')->name('destroy');

        });
    
        // My rental requests (for both buyers and sellers)
        Route::get('/my-rental-requests', 'myRentalRequests')->name('my-rental-requests');
    
        // Payment processing
        Route::post('/process-payment', 'processPayment')->name('process-payment');
    });
    
