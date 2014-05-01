<?php

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

Route::get('/register', 'RegistrationController@create');
Route::resource('registration', 'RegistrationController');

Route::get('login', 'SessionsController@create'); // in the next lesson
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');