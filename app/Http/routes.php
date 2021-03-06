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

// Welcome route...
Route::get('/', 'Auth\AuthController@getWelcome');

// User profile routes...
Route::get('/home', 'User\UserController@getDashboard');
Route::get('profile/{id}', 'User\UserController@getProfile');

// Confirm not smoking...
Route::get('status', 'User\UserController@getStatus');
Route::post('status', 'User\UserController@postStatus');

// User settings routes...
Route::get('settings', 'User\UserController@getSettings');
Route::post('settings', 'User\UserController@postSettings');

// User quit routes...
Route::get('quit', 'Quit\QuitController@create');
Route::post('quit', 'Quit\QuitController@store');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');