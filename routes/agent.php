<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\CheckoutController;
use App\Http\Controllers\Agent\PricingController;
use App\Http\Controllers\Agent\PropertyController;

require __DIR__ . '/auth.php';

Route::controller(AgentController::class)->group(function () {
    Route::get('/login', 'agentlogin')->name('login');
    Route::get('/register', 'agentregister')->name('register');
    Route::get('/forgot-password', 'forgotpassword')->name('forgot.password');
    Route::get('/reset-password/{token}', 'resetpassword')->name('reset.password');
    Route::post('/register/store', 'agentregisterstore')->name('register.store');
});

Route::middleware(['auth', 'verified', 'role:agent'])->group(function () {
    Route::controller(AgentController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/profile', 'editprofile')->name('edit.profile');
        Route::put('/update/profile', 'updateprofile')->name('update.profile');
        Route::get('/change/password', 'changepassword')->name('change.password');
        Route::put('/update/password', 'updatepassword')->name('update.password');
        Route::post('/logout', 'agentlogout')->name('logout');
    });

    // property all routes
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/active/property', 'activeproperty')->name('active.property');
        Route::get('/deactive/property', 'deactiveproperty')->name('deactive.property');
        Route::get('/change/hot/property/status', 'hotproperty')->name('hot.property.status');
        Route::get('/change/featured/property/status', 'featuredproperty')->name('featured.property.status');
        Route::get('/change/property/status', 'propertystatus')->name('property.status');
    });
    Route::resource('/property', PropertyController::class);

    Route::controller(PricingController::class)->group(function () {
        Route::get('/buy-plan', 'allplan')->name('all.plan');
        Route::get('/package-purchase/history', 'purchasehistory')->name('package.purchase.history');
    });
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/buy-package/{id}/{package_name}', 'checkout')->name('price.plan.checkout');
        Route::post('/stripe/checkout', 'stripecheckout')->name('stripe.checkout');
        Route::post('/stripe/payment', 'stripepayment')->name('stripe.payment');
    });
});
