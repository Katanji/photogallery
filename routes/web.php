<?php

Route::get('/register', 'Auth\RegistrationController@create')->name('register');
Route::post('/register', 'Auth\RegistrationController@store');
Route::get('/login', 'Auth\SessionsController@create')->name('login');
Route::post('/login', 'Auth\SessionsController@store');
Route::get('/logout', 'Auth\SessionsController@destroy')->name('logout');

Route::group(
    [
        'prefix'     => 'admin',
        'as'         => 'admin.',
        'namespace'  => 'Admin',
        'middleware' => ['auth']
    ],
    function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('albums', 'AlbumController');
        Route::post('/albums/saveOrder', 'AlbumController@saveOrder')->name('albums.order');

        Route::resource('users', 'UsersController@index');

        Route::resource('albums.photos', 'PhotoController');
        Route::post('/albums/{album}/photos/order', 'PhotoController@saveOrder')->name('albums.photos.order');
    }
);

Route::group(
    [
        'as'         => 'front.',
        'namespace'  => 'Front'
    ],
    function () {
        Route::get('/', 'AlbumController@index')->name('home');
        Route::get('albums/{album}', 'AlbumController@show')->name('albums.show');
    }
);





