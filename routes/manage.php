<?php

use App\Http\Controllers\Admin\AccommodationTypeController;
use App\Http\Controllers\Owner\CompanyController;
use Illuminate\Support\Facades\Route;


Route::name('owner.')
    ->prefix('owner')
    ->as('owner.')->group(function () {

        Route::resource('company', CompanyController::class);

        Route::resource('product', \App\Http\Controllers\Owner\ProductController::class);

        Route::resource('accommodation', \App\Http\Controllers\Owner\AccommodationController::class);

        Route::resource('venue', \App\Http\Controllers\Owner\VenueController::class);

        Route::resource('event', \App\Http\Controllers\Owner\EventController::class);

//        Route::get('user/{id}', 'UserController@showUser')->name('show.user');

    });

Route::prefix('manage')->as('admin.')->middleware(['auth', 'verified'])->group(callback: function () {
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
    Route::resource('posts', 'Admin\PostController');
    Route::resource('events', 'Admin\EventController');
    Route::resource('companies', 'Admin\CompanyController');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('teams', 'Admin\GroupController');
    Route::resource('accommodation-types', AccommodationTypeController::class);

});

Route::get('/thankyou', 'Client\ConfirmationController@index')->name('confirmation.index');
