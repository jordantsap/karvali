<?php

Route::prefix('manage')->middleware(['auth', 'verified'])->group(function() {
  Route::get('/', 'Admin\HomeController@index')->name('dashboard');
  Route::get('dashboard', 'Admin\HomeController@index')->name('dashboard');
  Route::resource('adverts', 'Admin\AdvertController');
  Route::get('payments', 'Client\InformationController@PaymentsPage')->name('payments');
  Route::resource('roles', 'Admin\RoleController');
  Route::resource('permissions','Admin\PermissionController');
  Route::resource('users', 'Admin\UserController');
  Route::resource('photos', 'Admin\AlbumPhotoController');
  Route::resource('newsletters', 'Admin\NewsletterController');
  // Route::post('albums/{photo}', 'Admin\AlbumPhotoController@store')->name('albumphotos.store');
  Route::resource('albums', 'Admin\AlbumController');
  Route::resource('posts', 'Admin\PostController');
  Route::resource('events', 'Admin\EventController');
  Route::resource('company', 'Admin\CompanyController');
  Route::resource('prod', 'Admin\ProductController');
  Route::resource('group', 'Admin\GroupController');

  // Route::get('companies', 'HomeController@companies')->name('admin.companies');
  // Route::get('myproducts', 'HomeController@products')->name('admin.products');
  // Route::get('mygroups', 'HomeController@groups')->name('admin.groups');
  // Route::get('events', 'HomeController@events')->name('admin.events');
  // Route::get('users/{id}', 'UserController@showUser')->name('admin.show.user');
});

Route::get('/thankyou', 'Client\ConfirmationController@index')->name('confirmation.index');
