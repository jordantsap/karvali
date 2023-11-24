<?php

use App\Http\Controllers\Admin\{AccommodationController, AccommodationTypeController};
use App\Http\Controllers\Owner\{AmenityController,
    ClubEventController,
    CompanyController,
    EventController,
    FieldController,
    GroupController,
    ProductController,
    RoomController,
    RoomTypeController,
    VenueController};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified','checkPlanAndExpiration'])
    ->name('owner')
    ->prefix('owner')
    ->as('owner.')->group(function () {

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

        Route::resource('attributes', \App\Http\Controllers\Owner\AttributeController::class);

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
    Route::resource('attributes', \App\Http\Controllers\Admin\AttributeController::class);
    Route::resource('teams', 'Admin\GroupController');
    Route::resource('accommodation-types', AccommodationTypeController::class);
    Route::resource('accommodations', AccommodationController::class);

});

Route::get('/thankyou', 'Client\ConfirmationController@index')->name('confirmation.index');


//        Route::post('tmp-upload/', [\App\Http\Controllers\FilePondController::class, 'tmpUpload'])->name('tmpUpload');
//        Route::delete('tmp-delete', [\App\Http\Controllers\FilePondController::class,'tpmDelete'])->name('tmpDelete');

//        Route::get('user/{id}', 'UserController@showUser')->name('show.user');
