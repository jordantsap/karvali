<?php

use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\AccommodationTypeController;
use App\Http\Controllers\Auth\AuthRequestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Owner\AmenityController;
use App\Http\Controllers\Owner\ClubEventController;
use App\Http\Controllers\Owner\CompanyController;
use App\Http\Controllers\Owner\EventController;
use App\Http\Controllers\Owner\FieldController;
use App\Http\Controllers\Owner\GroupController;
use App\Http\Controllers\Owner\ProductController;
use App\Http\Controllers\Owner\RoomController;
use App\Http\Controllers\Owner\RoomTypeController;
use App\Http\Controllers\Owner\VenueController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function() {
  Route::post('/register', [AuthRequestController::class,'store'])->name('postregister');
  Route::get('userlogin', [LoginController::class,'showLoginForm'])->name('userlogin');
  Route::post('login', 'Auth\LoginController@login')->name('postlogin');
  //Password reset routes
  Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
  ->name('guest.password.request');
  Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
  ->name('guest.password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
  ->name('guest.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});
//VERIFY ROUTES
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');


Route::middleware(['auth', 'verified','checkPlanAndExpiration'])
    ->name('owner')
    ->prefix('owner')
    ->as('owner.')->group(callback: function () {

        Route::resource('companies', CompanyController::class);

        Route::resource('products', ProductController::class);

        Route::resource('accommodation', \App\Http\Controllers\Owner\AccommodationController::class);

        Route::resource('amenities', AmenityController::class);

        Route::resource('rooms', RoomController::class);

        Route::resource('room-types', RoomTypeController::class);

        Route::resource('venues', VenueController::class);

        Route::resource('groups', GroupController::class);

        Route::resource('events', EventController::class);

        Route::resource('fields', FieldController::class);

        Route::resource('clubevents', ClubEventController::class);
    });

Route::prefix('manage')->as('admin.')->middleware(['auth'])->group(callback: function () {
    Route::get('/', 'Admin\HomeController@index');//->name('dashboard');
    Route::get('dashboard', 'Admin\HomeController@index')->name('dashboard');
    Route::resource('adverts', 'Admin\AdvertController');
    Route::get('payments', 'Client\InformationController@PaymentsPage')->name('payments');
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('permissions', 'Admin\PermissionController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('photos', 'Admin\AlbumPhotoController');
    Route::resource('newsletters', 'Admin\NewsletterController');
    // Route::post('albums/{photo}', 'Admin\AlbumPhotoController@store')->name('albumphotos.store');
    Route::resource('albums', 'Admin\AlbumController');
    Route::resource('groups', 'Admin\GroupController');
    Route::resource('posts', 'Admin\PostController');
    Route::resource('events', 'Admin\EventController');
    Route::resource('companies', 'Admin\CompanyController');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('teams', 'Admin\GroupController');
    Route::resource('accommodation-types', AccommodationTypeController::class);
    Route::resource('accommodations', AccommodationController::class);

});

Route::get('/thankyou', 'Client\ConfirmationController@index')->name('confirmation.index');


//        Route::post('tmp-upload/', [\App\Http\Controllers\FilePondController::class, 'tmpUpload'])->name('tmpUpload');
//        Route::delete('tmp-delete', [\App\Http\Controllers\FilePondController::class,'tpmDelete'])->name('tmpDelete');

//        Route::get('user/{id}', 'UserController@showUser')->name('show.user');
