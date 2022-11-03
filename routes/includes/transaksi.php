<?php

use Illuminate\Support\Facades\Route;

Route::get('/transaksi/{id}','TransaksiController@store');
Route::post('/transaksi/{id}','TransaksiController@update');
Route::get('/transaksi/{id}/edit','TransaksiController@show');
Route::delete('/transaksi/{id}','TransaksiController@destroy');
