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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('pages/add', 'HomeController@pagesAdd');
Route::get('pages/edit', 'HomeController@pagesEdit');
Route::get('pages/show', 'WelcomeController@pagesShow');

Route::get('news/add', 'HomeController@newsAdd');
Route::get('news/edit', 'HomeController@newsEdit');
Route::get('news/show', 'WelcomeController@newsShow');

Route::get('events/add', 'HomeController@eventsAdd');
Route::get('events/edit', 'HomeController@eventsEdit');
Route::get('events/show', 'HomeController@eventsShow');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
