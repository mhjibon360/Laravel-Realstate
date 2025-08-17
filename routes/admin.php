<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\NearbyController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BlogTagController;
use App\Http\Controllers\Backend\BlogPostController;
use App\Http\Controllers\Backend\ChooseusController;
use App\Http\Controllers\Backend\DownloadController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\PlatformController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\FloorplanController;
use App\Http\Controllers\Backend\MultiimageController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\PropertytypeController;
use App\Http\Controllers\Backend\PropertyCategoryController;

require __DIR__ . '/auth.php';

Route::controller(BackendController::class)->group(function () {
    Route::get('/login', 'adminlogin')->name('logint');
    Route::get('/forgot-password', 'forgotpassword')->name('forgot.password');
    Route::get('/reset-password/{token}', 'resetpassword')->name('reset.password');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // backend controller all routes
    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/edit/profile', 'editprofile')->name('edit.profile');
        Route::put('/update/profile', 'updateprofile')->name('update.profile');

        Route::get('/change/password', 'changepassword')->name('change.password');
        Route::put('/update/password', 'updatepassword')->name('update.password');
        Route::post('/logout', 'adminlogout')->name('logout');
    });

    // banneer controler all routes
    Route::controller(BannerController::class)->group(function () {
        Route::get('/manage/banner', 'managebanner')->name('manage.banner');
        Route::put('/update/banner', 'updatebanner')->name('update.banner');
    });

    // download controler all routes
    Route::controller(DownloadController::class)->group(function () {
        Route::get('/manage/download', 'managedownload')->name('manage.download');
        Route::put('/update/download', 'updatedownload')->name('update.download');
    });

    // video all routes
    Route::controller(VideoController::class)->group(function () {
        Route::get('/manage/video', 'managevideo')->name('manage.video');
        Route::put('/update/video', 'updatevideo')->name('update.video');
    });



    // why choose us item all routes
    Route::resource('/choose/us', ChooseusController::class);

    // platform all routes
    Route::resource('/platform', PlatformController::class);

    // testimonial all routes
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/testimonial/status', 'testimonialstatus')->name('testimonial.status');
    });
    Route::resource('/testimonial', TestimonialController::class);



    // property category all routes
    Route::resource('/property-category', PropertyCategoryController::class);

    // property type all routes
    Route::resource('/property-type', PropertytypeController::class);

    // location all routes
    Route::resource('/location', LocationController::class);

    // property all routes
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/active/property', 'activeproperty')->name('active.property');
        Route::get('/deactive/property', 'deactiveproperty')->name('deactive.property');
        Route::get('/change/hot/property/status', 'hotproperty')->name('hot.property.status');
        Route::get('/change/featured/property/status', 'featuredproperty')->name('featured.property.status');
        Route::get('/change/property/status', 'propertystatus')->name('property.status');
    });
    Route::resource('/property', PropertyController::class);

    // multi iamge all routes
    Route::resource('/multiimage', MultiimageController::class);

    // nearby all routes
    Route::resource('/nearby', NearbyController::class);

    // floor plan all routes
    Route::resource('/floor/plan', FloorplanController::class);



    // blogpost all routes
    Route::resource('/blog-post', BlogPostController::class);

    // blogcategory all routes
    Route::resource('/blog-category', BlogCategoryController::class);

    // blogtag all routes
    Route::resource('/blog-tag', BlogTagController::class);
});
