<?php

use Illuminate\Support\Facades\Route;

// Language Switcher

Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/listings', [\App\Http\Controllers\ListingController::class, 'index'])->name('listings');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
