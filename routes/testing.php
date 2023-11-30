<?php

use App\Models\unused\Period;

// HOME PAGE ROUTE
//Route::get('/', [App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');
Route::get('/test', function (){

    $weekdays = \App\Models\unused\Day::all();
    $dayPeriods = Period::get();

    $hours = [];
    for ($hour = 0; $hour < 24; $hour++) {
        for ($minute = 0; $minute < 60; $minute += 30) {
            $hours[] = sprintf('%02d:%02d', $hour, $minute);
        }
    }

    return view('open-hours-form', compact('weekdays', 'dayPeriods', 'hours'));

});
Route::post('/open-hours', function (\Illuminate\Http\Request $request){
    dd($request->all());
})->name('save_open_hours');


// AUTH ROUTE
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('{slug}/photo-album', 'Client\AlbumController@show')->name('gallery');
//Route::get('photo-albums', 'Client\AlbumController@index')->name('galleries');

//    Route::get('products', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('products');

//    Route::get('/available-dates', 'Client\BookingController@getAvailableRooms')->name('available-rooms');


//    Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');


// Route::view('/register', 'errors.404')->name('register-error');
