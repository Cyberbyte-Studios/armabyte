<?php

Route::group(['prefix' => 'armalife', 'middleware' => 'auth:api'], function() {
    Route::get('dashboard', 'ArmaLifeController@dashboard');
    Route::resource('player', PlayerController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('house', HouseController::class);
    Route::resource('container', ContainerController::class);
    Route::resource('wanted', WantedController::class);
    Route::resource('gang', GangController::class);
});
