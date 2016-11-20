<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'api/v1/armalife'], function() {
    Route::get('player/table/{limit?}', 'PlayerController@table');
    Route::get('house/table/{limit?}', 'HouseController@table');
    Route::get('dashboard', 'ArmaLifeController@dashboard');
    Route::resource('player', PlayerController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('house', HouseController::class);
    Route::resource('container', ContainerController::class);
    Route::resource('wanted', WantedController::class);
    Route::resource('gang', GangController::class);
    
	
	Route::get('/', function() {
		dd('This is the arma life module index page.');
	});
});
