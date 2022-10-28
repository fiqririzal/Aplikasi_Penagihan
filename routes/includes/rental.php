<?php

use Illuminate\Support\Facades\Route;

Route::get('/rental','RentalController@index');
Route::post('/rental','RentalController@store');
Route::get('/rental/{id}','RentalController@show');
Route::post('/rental/{id}','RentalController@update');
Route::delete('/rental/{id}','RentalController@destroy');
// Route::get('/rental/{id}/sewa','RentalController@sewa');
// Route::post('/rental/{id}/sewa','RentalController@sewaUpdate');

?>
