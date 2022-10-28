<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Require_once('includes/auth.php');

Route::group([
    'middleware'=>'auth'
], function() {
    Route::get('/dashboard',function(){
        return view('layouts.master');
    });
    Require_once('includes/member.php');
    Require_once('includes/rental.php');
    Require_once('includes/transaksi.php');
});


