<?php

Route::get('/register', 'Auth\RegistrationController@create')->name('register');
Route::post('/register', 'Auth\RegistrationController@store');
Route::get('/login', 'Auth\SessionsController@create')->name('login');
Route::post('/login', 'Auth\SessionsController@store');
Route::get('/logout', 'Auth\SessionsController@destroy')->name('logout');

Route::get('/', 'AlbumController@master')->name('home');
Route::get('/create', 'AlbumController@create')->name('album.create');
Route::post('/create', 'AlbumController@store');

Route::get('/admin', 'AlbumController@albums')->middleware('auth');
Route::post('/saveAlbumOrder', 'AlbumController@newData');

Route::get('/admin/album/{album_id}', 'AlbumController@edit')->name('admin.album.edit');
Route::get('/front/album/{album_id}', 'AlbumController@album')->name('front.album');

Route::post('/savePhotoOrder', 'PhotoController@saveOrder');
Route::get('/admin/add_photos/{album_id}', 'PhotoController@add');
Route::post('/admin/albums/{album_id}/photos', 'PhotoController@store')->name('admin.add_photo');
