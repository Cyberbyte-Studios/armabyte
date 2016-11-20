<?php

Route::group(['prefix' => 'rcon', 'middleware' => ['auth:api', 'scope:rcon']], function() {
    Route::get('/ping', 'ApiController@ping');
    Route::get('/players', 'ApiController@players');
    Route::get('/bans', 'ApiController@bans');
    Route::get('/banPlayer/{player}/{time?}/{reason?}', 'ApiController@banPlayer');
    Route::get('/addBan/{player}/{time?}/{reason?}', 'ApiController@addBan');
    Route::get('/removeBan/{banId}', 'ApiController@removeBan');
    Route::get('/sayGlobal/{message}', 'ApiController@sayGlobal');
    Route::get('/sayPlayer/{player}/{message}', 'ApiController@sayPlayer');
});
