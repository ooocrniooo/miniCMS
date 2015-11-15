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
Route::get('/services', 'PagesController@index');








Route::get('admin', 'HomeController@index');
Route::get('home', 'HomeController@index');
// Admin Pages Route
Route::get('pages/add', 'HomeController@pagesAdd');
Route::get('pages/edit/{id}', 'HomeController@pagesEdit');
Route::post('pages/save', 'HomeController@pagesSave');
Route::get('pages/list', 'HomeController@pagesList');
Route::get('pages/show', 'WelcomeController@pagesShow');
Route::post('pages/file-upload', 'WelcomeController@pagesPicUpload');
Route::get('pages/file-upload', 'WelcomeController@pagesPicUpload');
//Route::post('admin/upload', ['as' => 'admin.upload', 'uses' => 'HomeController@upload']);

// Admin Events Route
Route::get('events/add', 'HomeController@eventsAdd');
Route::get('events/edit/{id}', 'HomeController@eventsEdit');
Route::post('events/save', 'HomeController@eventsSave');
Route::get('events/save/flights/{id}/{fromair}/{arrdate}/{arrtime}/{fromway}/{location}', 'HomeController@eventsSaveArr');
Route::get('events/getcoachtable/{id}/{fromair}/{way}', 'HomeController@eventsGetCoachTable');
//Route::post('events/savearrival', 'HomeController@eventsSaveArr');
Route::post('events/savedeparture', 'HomeController@eventsSaveDep');
Route::get('events/list', 'HomeController@eventsList');
Route::get('events/show', 'WelcomeController@eventsShow');

// Admin News Route
Route::get('news/add', 'HomeController@newsAdd');
Route::get('news/edit', 'HomeController@newsEdit');
Route::get('news/save', 'HomeController@newsSave');
Route::get('news/list', 'HomeController@newsList');
Route::get('news/show', 'WelcomeController@newsShow');


//Admin Event transfer management
Route::get('management/eventtransfer', 'HomeController@eventTransfer');
Route::get('management/transtransfer', 'HomeController@transTransfer');
Route::get('options/transferoptions', 'HomeController@transOptions');

Route::controller('apiMaps', 'apiMaps');
//
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


