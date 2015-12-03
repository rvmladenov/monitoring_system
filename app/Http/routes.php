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

Route::get('/admin', ['middleware'=>'auth', 'uses' => 'Admin\AdministrationController@index']);
Route::get('/admin/profile', ['middleware'=>'auth', 'uses' =>'Admin\ProfileController@index']);

Route::get('/admin/systems', ['middleware'=>'auth', 'uses' =>'SystemController@index']);
Route::get('/admin/systems/{id}', ['middleware'=>'auth', 'uses' =>'SystemController@show']);

Route::get('dynSystems', ['middleware'=>'auth', 'uses' =>'TestController@index']);

Route::get('files', 'FilesController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
