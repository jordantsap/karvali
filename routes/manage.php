<?php

use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\AccommodationTypeController;
use App\Http\Controllers\Owner\CompanyController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])
    ->name('owner')
    ->prefix('owner')
    ->as('owner.')->group(function () {

        Route::resource('company', CompanyController::class);

        Route::resource('product', \App\Http\Controllers\Owner\ProductController::class);

        Route::resource('accommodation', \App\Http\Controllers\Owner\AccommodationController::class);

        Route::resource('amenities', \App\Http\Controllers\Owner\AmenityController::class);

        Route::resource('rooms', \App\Http\Controllers\Owner\RoomController::class);

        Route::resource('room-types', \App\Http\Controllers\Owner\RoomTypeController::class);

        Route::resource('venues', \App\Http\Controllers\Owner\VenueController::class);

        Route::resource('events', \App\Http\Controllers\Owner\EventController::class);
//
//        Route::post('tmp-upload/', [\App\Http\Controllers\FilePondController::class, 'tmpUpload'])->name('tmpUpload');
//        Route::delete('tmp-delete', [\App\Http\Controllers\FilePondController::class,'tpmDelete'])->name('tmpDelete');

//        Route::get('user/{id}', 'UserController@showUser')->name('show.user');

    });
Route::post('accommodations/media', [\App\Http\Controllers\DropzoneController::class, 'storeMedia'])->name('projects.storeMedia');


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
    Route::resource('posts', 'Admin\PostController');
    Route::resource('events', 'Admin\EventController');
    Route::resource('companies', 'Admin\CompanyController');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('teams', 'Admin\GroupController');
    Route::resource('accommodation-types', AccommodationTypeController::class);
    Route::resource('accommodations', AccommodationController::class);

});

Route::get('/thankyou', 'Client\ConfirmationController@index')->name('confirmation.index');
