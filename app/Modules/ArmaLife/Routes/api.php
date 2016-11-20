<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'armalife', 'middleware' => 'auth:api'], function() {
    Route::get('dashboard', 'ArmaLifeController@dashboard');
    Route::resource('player', PlayerController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('house', HouseController::class);
    Route::resource('container', ContainerController::class);
    Route::resource('wanted', WantedController::class);
    Route::resource('gang', GangController::class);
});
