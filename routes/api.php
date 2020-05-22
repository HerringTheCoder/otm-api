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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    echo 'OpenTransportManager API';
});

Route::fallback(function () {
    return redirect()->to('https://opentransportmanager.github.io/otm-docs/');
});

Route::get('stations/subscribed', 'StationController@subscribed');
Route::resource('stations', 'StationController')->except(['edit', 'create']);
Route::resource('buslines', 'BuslineController')->except(['edit', 'create']);
