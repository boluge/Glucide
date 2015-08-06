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

Route::get('/', ['as'=>'home', function () {
    return view('welcome');
}]);

// Authentication routes...
Route::get('auth/login', [ 'as'=>'auth.getlogin' ,'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', [ 'as'=>'auth.postlogin' ,'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', [ 'as'=>'auth.logout' ,'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', [ 'as'=>'auth.getregister' ,'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', [ 'as'=>'auth.postregister' ,'uses' => 'Auth\AuthController@postRegister']);

// Foods
Route::get('food', [ 'as' => 'food.index', 'uses' => 'Admin\FoodController@index' ]);
Route::get('food/create', [ 'as' => 'food.create', 'uses' => 'Admin\FoodController@create' ]);
Route::post('food', [ 'as' => 'food.store', 'uses' => 'Admin\FoodController@store' ]);
Route::get('food/{id}/edit', [ 'as' => 'food.edit', 'uses' => 'Admin\FoodController@edit' ]);
Route::post('food/{id}/update', [ 'as' => 'food.update', 'uses' => 'Admin\FoodController@update' ]);
Route::get('food/{id}/delete', [ 'as' => 'food.delete', 'uses' => 'Admin\FoodController@destroy' ]);

// Food's category
Route::get('category', [ 'as' => 'category.index', 'uses' => 'Admin\CategoryController@index' ]);
Route::get('category/create', [ 'as' => 'category.create', 'uses' => 'Admin\CategoryController@create' ]);
Route::post('category', [ 'as' => 'category.store', 'uses' => 'Admin\CategoryController@store' ]);
Route::get('category/{id}/edit', [ 'as' => 'category.edit', 'uses' => 'Admin\CategoryController@edit' ]);
Route::post('category/{id}/update', [ 'as' => 'category.update', 'uses' => 'Admin\CategoryController@update' ]);
Route::get('category/{id}/delete', [ 'as' => 'category.delete', 'uses' => 'Admin\CategoryController@destroy' ]);