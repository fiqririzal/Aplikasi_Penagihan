<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'guest',
], function() {
    Route::get('/', 'AuthController@view')->name('login');
    Route::post('/', 'AuthController@login');
    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister');
});
Route::group([
    'middleware' => 'auth',
], function() {
    Route::get('/logout', 'AuthController@logout');
});
