<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'App\Http\Controllers\Spa\SpaAuthController@login')->name('login');
Route::post('/register', 'App\Http\Controllers\Spa\SpaAuthController@register')->name('register');

/* Sanctum */

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout', 'App\Http\Controllers\Spa\AuthController@logout')->name('logout');
    Route::get('/events', 'App\Http\Controllers\Event\EventController@list');
});
