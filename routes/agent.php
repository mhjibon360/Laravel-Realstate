<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentController;

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
});
