<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('register', ['as' => 'register_path', 'uses' => 'RegistrationController@create']);
Route::post('register', ['as' => 'register_path', 'uses' => 'RegistrationController@store']);

Route::get('phpinfo', ['as' => 'phpinfo', 'uses' => 'PagesController@phpinfo']); //TODO remove

Route::get('login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@create'
]);
Route::post('login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@store'
]);
Route::get('logout', [
    'as'   => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

Route::get('statuses', [
    'as'   => 'statuses_path',
    'uses' => 'StatusesController@index'
]);
Route::post('statuses', [
    'as'   => 'statuses_path',
    'uses' => 'StatusesController@store'
]);

Route::get('users', [
    'as'   => 'users_path',
    'uses' => 'UsersController@index'
]);

Route::get('@{username}', [
    'as'   => 'profile_path',
    'uses' => 'UsersController@show'
]);

Route::post('follows', [
    'as'   => 'follows_path',
    'uses' => 'FollowsController@store'
]);
Route::delete('follows/{id}', [
    'as'   => 'unfollows_path',
    'uses' => 'FollowsController@destroy'
]);