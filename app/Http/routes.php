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

Route::get('/', 'HomeController@index');

Route::get('/admin/', 'Admin\AdministrationController@index');
Route::get('/admin/profile', 'Admin\ProfileController@index');

Route::get('/admin/systems', 'SystemController@index');
Route::get('/admin/systems/{id}', 'SystemController@show');

Route::get('dynSystems', 'TestController@index');

Route::get('/testsql', 'HomeController@testMSSQL');