<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentController;

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AgentController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/edit/profile', 'edit')->name('edit.profile');
        Route::put('/update/profile', 'update')->name('update.profile');
    });
});