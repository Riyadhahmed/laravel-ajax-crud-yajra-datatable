<?php


Route::get('/', 'ContactController@home')->name('home');

Route::resource('contacts', 'ContactController');
Route::get('/getall', 'ContactController@getall')->name('getall.contacts');