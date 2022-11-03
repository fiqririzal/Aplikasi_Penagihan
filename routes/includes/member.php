<?php

use Illuminate\Support\Facades\Route;

Route::get('/member','MemberController@index');
Route::post('/member','MemberController@store');
Route::get('/member/{id}','MemberController@show');
Route::delete('/member/{id}','MemberController@destroy');

?>
