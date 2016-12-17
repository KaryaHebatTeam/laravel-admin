<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/admin', 'AdminController@dashboard');
Route::get('/admin/settings', 'AdminController@settings');
Route::get('/admin/edit-profile', 'AdminController@editProfile');
