<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/vehicles', function() {
   return view("armalife::vehicles");
});

Route::get('/players', function() {
    return view("armalife::players");
});
