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

Route::get('/admin/system/addSystem', ['middleware'=>'auth', 'uses' =>'SystemController@create']);
Route::post('/admin/system/store',['middleware'=>'auth', 'uses' =>'SystemController@store']);

Route::get('/admin/system/{id}/editSystem',['middleware'=>'auth', 'uses' =>'SystemController@edit']);
Route::post('/admin/system/update', ['middleware'=>'auth', 'uses' =>'SystemController@update']);
Route::post('/admin/system/{id}/delete', ['middleware'=>'auth', 'uses' =>'SystemController@destroy']);

Route::get('/admin/user/addUser', ['middleware'=>'auth', 'uses' =>'UserController@create']);
Route::post('/admin/user/store',['middleware'=>'auth', 'uses' =>'UserController@store']);

Route::get('/admin/user/{id}/editUser',['middleware'=>'auth', 'uses' =>'UserController@edit']);
Route::post('/admin/user/update', ['middleware'=>'auth', 'uses' =>'UserController@update']);
Route::post('/admin/user/{id}/delete', ['middleware'=>'auth', 'uses' =>'UserController@destroy']);

Route::get('dynSystems', ['middleware'=>'auth', 'uses' =>'TestController@index']);

Route::get('files', ['middleware'=>'auth', 'uses' =>'FilesController@index']);
Route::get('files/{directory?}', ['middleware'=>'auth', 'uses' =>'FilesController@show']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
