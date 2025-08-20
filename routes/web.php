<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Frontend\UserConroller;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\WishlitController;
use App\Http\Controllers\Frontend\FrontendController;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/news/details/{slug}', 'newsdetails')->name('news.details');
    Route::get('/property/details/{property_slug}', 'propertydetails')->name('property.details');
    Route::get('/property/category', 'propertycategory')->name('property.category');
    Route::get('/category/{category_slug}', 'categorywiseproperty')->name('category.wise.property');
    Route::get('/our/agent', 'ouragent')->name('our.agent');
    Route::get('/agent/{id}/{username}', 'agendetails')->name('agent.details');
    Route::post('/contact/agent/mesasge', 'contactagentmessage')->name('contact.agent.message')->middleware(['auth', 'verified']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(UserConroller::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/edit/profile', 'editprofile')->name('edit.profile');
        Route::put('/update/profile', 'updateprofile')->name('update.profile');

        Route::get('/change/password', 'changepassword')->name('change.password');
        Route::put('/update/password', 'updatepassword')->name('update.password');
    });
});

Route::controller(WishlitController::class)->group(function () {
    Route::get('/wishlist/data', 'wishlistdata')->name('wishlist.data');
    Route::post('/wishlist/remove', 'wishlistremove')->name('wishlist.remove');
});
Route::resource('/wishlist', WishlitController::class);

Route::controller(CompareController::class)->group(function () {
    Route::get('/compare/data', 'comparedata')->name('compare.data');
    Route::post('/compare/remove', 'compareremove')->name('compare.remove');
});
Route::resource('/compare', CompareController::class);
