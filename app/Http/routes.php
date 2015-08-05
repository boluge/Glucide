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

// Foods
Route::resource('food', 'Admin\FoodController');
Route::get('food', [ 'as' => 'food.index', 'uses' => 'Admin\FoodController@index' ]);
Route::get('food/create', [ 'as' => 'food.create', 'uses' => 'Admin\FoodController@create' ]);
Route::post('food', [ 'as' => 'food.store', 'uses' => 'Admin\FoodController@store' ]);
Route::get('food/{id}/edit', [ 'as' => 'food.edit', 'uses' => 'Admin\FoodController@edit' ]);
Route::post('food/{id}/update', [ 'as' => 'food.update', 'uses' => 'Admin\FoodController@update' ]);
Route::post('food/{id}/delete', [ 'as' => 'food.delete', 'uses' => 'Admin\FoodController@destroy' ]);
