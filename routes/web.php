<?php

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/', 'AlbumController@master');
Route::get('/create', 'AlbumController@create');
Route::post('/create', 'AlbumController@store');

Route::get('/admin', 'AlbumController@albums');
Route::post('/saveAlbumOrder', 'AlbumController@newData');

Route::get('/admin/album/{album_id}', 'AlbumController@edit');
Route::get('/front/album/{album_id}', 'AlbumController@album');

Route::post('/savePhotoOrder', 'PhotoController@saveOrder');
Route::get('/admin/add_photos/{album}', 'PhotoController@add');
Route::post('/admin/albums/{album_id}/photos', 'PhotoController@store')->name('admin.add_photo');
