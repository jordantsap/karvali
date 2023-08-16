<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('search', 'SearchController@getresults')->name('searchresults');

// Route::view('/register', 'errors.404')->name('register-error');
// Auth::routes();
  Route::get('register/{membership_title?}', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.membership');
 Auth::routes(['verify' => true]);
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::middleware(['guest'])->group(function() {
//  Route::post('/register', 'Auth\AuthRequestController@store')->name('register');
//  Route::get('login', 'Auth\LoginController@showLoginForm')->name('logform');
//  Route::post('login', 'Auth\LoginController@login')->name('login');
//  //Password reset routes
//  Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
//  ->name('guest.password.request');
//  Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
//  ->name('guest.password.email');
//  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
//  ->name('guest.password.reset');;
//  Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//});
//VERIFY ROUTES
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

// EMAIL RESEND ROUTES
 Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::post('subscribers', 'Client\SubscriberController@store')->name('subscribers.store');

Route::resource('comment', 'Client\CommentController');
Route::resource('like', 'Client\LikeController');
Route::resource('cart', 'Client\CartController');
Route::post('clean-cart', 'Client\CartController@clean')->name('cart.clean');

Route::resource('order', 'Client\OrderController');

Route::resource('/checkout', 'Client\CheckoutController');
Route::get('/guestcheckout', 'Client\CheckoutController@index')->name('guestcheckout.index')->middleware('guest');
Route::get('/thankyou', 'Client\ConfirmationController@index')->name('confirmation.index');


Route::as('front.')->group(function () {

    Route::get('accommodations/', [\App\Http\Controllers\Client\AccommodationController::class, 'index'])->name('accommodations');
    Route::get('accommodations/{accommodation:slug}', [\App\Http\Controllers\Client\AccommodationController::class, 'show'])->name('accommodation.show');

    Route::get('accommodation-types/{slug}', [\App\Http\Controllers\Client\AccommodationController::class, 'category'])
        ->name('accommodation-types.show');

    Route::get('rooms/', [\App\Http\Controllers\Client\RoomController::class, 'index'])->name('rooms');
    Route::get('rooms/{room}', [\App\Http\Controllers\Client\RoomController::class, 'show'])->name('room.show');

    Route::get('accommodations/{accommodationId}/rooms/{room}', 'RoomController@show')->name('accommodation.room.show');


//    Route::get('accommodation-types', [\App\Http\Controllers\Client\AccommodationTypeController::class, 'index'])
//        ->name('accommodationtype.show');

Route::view('calendar','calendar');

    Route::resource('amenities', 'Client\CompanyController@index');

    Route::get('markets', 'Client\CompanyController@index')->name('companies');
    Route::get('market/{slug}', [\App\Http\Controllers\Client\CompanyController::class, 'show'])->name('company');

    Route::get('products', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('products');
    Route::get('{product:slug}/product', [App\Http\Controllers\Client\ProductController::class, 'show'])->name('product');

    Route::get('venues', [App\Http\Controllers\Client\VenueController::class, 'index'])->name('venues');
    Route::get('venue/{slug}', [App\Http\Controllers\Client\VenueController::class, 'show'])->name('venue.show');

//Route::get('venues', 'Client\GroupController@index')->name('venues');

    Route::get('news', [App\Http\Controllers\Client\PostController::class, 'index'])->name('news');
    Route::get('post/{slug}', [App\Http\Controllers\Client\PostController::class, 'show'])->name('news.show');

    Route::get('{posttype}/news-type', 'Client\PostController@category')->name('posts-category');
    Route::get('{grouptype}/venues-type', 'Client\GroupController@category')->name('venues-category');
    Route::get('{companytype}/markets-type', 'Client\CompanyController@category')->name('companies-category');
    Route::get('{producttype}/products-type', [App\Http\Controllers\Client\ProductController::class,'category'])->name('products-category');

    Route::get('events', 'Client\EventController@index')->name('events');
    Route::get('event/{event}', 'Client\EventController@show')->name('event.show');

    Route::get('past-events', [App\Http\Controllers\Client\EventDatesController::class,'pastevents'])->name('pastevents');
    Route::get('today-events', [App\Http\Controllers\Client\EventDatesController::class, 'todayevents'])->name('todayevents');
    Route::get('week-events', [App\Http\Controllers\Client\EventDatesController::class, 'weekevents'])->name('weekevents');
    Route::get('month-events', [App\Http\Controllers\Client\EventDatesController::class, 'monthevents'])->name('monthevents');
    Route::get('next-events', [App\Http\Controllers\Client\EventDatesController::class, 'upcomingevents'])->name('upcomingevents');

// HOME PAGE ROUTE
Route::get('/', [App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');
});

// AUTH ROUTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('group/{slug}', 'Client\GroupController@show')->name('group');
//Route::get('{slug}/photo-album', 'Client\AlbumController@show')->name('gallery');
//Route::get('photo-albums', 'Client\AlbumController@index')->name('galleries');
