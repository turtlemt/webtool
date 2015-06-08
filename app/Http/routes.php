<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::controller('user', 'UserController');
Route::controller('act', 'ActController');
Route::controller('map', 'MapController');*/
Route::get('tool/post', 'ToolController@post');
Route::get('googlesheet', 'GooglesheetController@index');