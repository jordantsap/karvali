<?php
Route::prefix('information-guides')->group(function() {

  Route::get('sxetika', 'Client\InformationController@AboutPage')->name('about');

  Route::get('/oroi-xrisis', 'Client\InformationController@TermsOfUsePage')->name('termsofuse');

  Route::view('cameres', 'information.cameras')->name('online-cameras');

  Route::get('/proswpika-dedomena', 'Client\InformationController@PersonalDataPage')->name('personaldata');

  Route::get('voitheia', 'Client\InformationController@HelpPage')->name('help');

  Route::get('/epikeinwnia', 'Client\InformationController@ContactPage')->name('contact');
  Route::post('/contact', 'Client\InformationController@postContact')->name('postContact');

  Route::get('customer-help-services', 'Client\InformationController@ServicesPage')->name('services');
  Route::get('security-privacy', 'Client\InformationController@PrivacyPage')->name('privacy');
  Route::get('affiliates', 'Client\InformationController@AfilliatePage')->name('affiliates');
  Route::get('how-to', 'Client\InformationController@HowToPage')->name('howto');
});
