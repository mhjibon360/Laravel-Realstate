<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});
