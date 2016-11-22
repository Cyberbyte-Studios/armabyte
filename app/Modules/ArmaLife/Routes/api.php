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
//, 'middleware' => 'auth:api'
Route::group(['prefix' => 'armalife'], function() {
    Route::get('dashboard', 'ArmaLifeController@dashboard');
    Route::resource('player', PlayerController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('house', HouseController::class);
    Route::resource('container', ContainerController::class);
    Route::resource('wanted', WantedController::class);
    Route::resource('gang', GangController::class);
    Route::group(['prefix' => 'datatable'], function () {
        Route::get('players', 'PlayerController@all');
        Route::get('vehicles', 'VehicleController@all');
        Route::get('houses', 'HouseController@all');
        Route::get('containers', 'ContainerController@all');
        Route::get('gangs', 'GangController@all');
        Route::get('crimes', 'WantedController@all');
    });
});
