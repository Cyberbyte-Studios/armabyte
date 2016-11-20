<?php

use Illuminate\Http\Request;

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


Route::get('audit', 'Api\NotificationController@audits');
Route::get('notifications', 'Api\NotificationController@notifications');
Route::get('notifications/read', 'Api\NotificationController@notificationsRead');
