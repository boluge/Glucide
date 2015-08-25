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

Route::filter('admin', function($route, $request) {
    if ( Auth::user()->roles != 'admin' ) {
        return App::abort(403, 'You are not authorized.');
    }
});

// Administrator
Route::group(['prefix'=>'admin', 'before' => ['auth|admin']], function(){
        // Foods
        Route::get('food', [ 'as' => 'food.index', 'uses' => 'Admin\FoodController@index' ]);
        Route::get('food/create', [ 'as' => 'food.create', 'uses' => 'Admin\FoodController@create' ]);
        Route::post('food', [ 'as' => 'food.store', 'uses' => 'Admin\FoodController@store' ]);
        Route::get('food/{id}/edit', [ 'as' => 'food.edit', 'uses' => 'Admin\FoodController@edit' ])->where('id', '[0-9]+');
        Route::post('food/{id}/update', [ 'as' => 'food.update', 'uses' => 'Admin\FoodController@update' ])->where('id', '[0-9]+');
        Route::get('food/{id}/delete', [ 'as' => 'food.delete', 'uses' => 'Admin\FoodController@destroy' ])->where('id', '[0-9]+');

        // Food's category
        Route::get('category', [ 'as' => 'category.index', 'uses' => 'Admin\CategoryController@index' ]);
        Route::get('category/create', [ 'as' => 'category.create', 'uses' => 'Admin\CategoryController@create' ]);
        Route::post('category', [ 'as' => 'category.store', 'uses' => 'Admin\CategoryController@store' ]);
        Route::get('category/{id}/edit', [ 'as' => 'category.edit', 'uses' => 'Admin\CategoryController@edit' ])->where('id', '[0-9]+');
        Route::post('category/{id}/update', [ 'as' => 'category.update', 'uses' => 'Admin\CategoryController@update' ])->where('id', '[0-9]+');
        Route::get('category/{id}/delete', [ 'as' => 'category.delete', 'uses' => 'Admin\CategoryController@destroy' ])->where('id', '[0-9]+');

        // Users
        Route::get('user', [ 'as' => 'user.index', 'uses' => 'Admin\UserController@index' ]);
        Route::get('user/create', [ 'as' => 'user.create', 'uses' => 'Admin\UserController@create' ]);
        Route::post('user', [ 'as' => 'user.store', 'uses' => 'Admin\UserController@store' ]);
        Route::get('user/{id}/edit', [ 'as' => 'user.edit', 'uses' => 'Admin\UserController@edit' ])->where('id', '[0-9]+');
        Route::post('user/{id}/update', [ 'as' => 'user.update', 'uses' => 'Admin\UserController@update' ])->where('id', '[0-9]+');
        Route::get('user/{id}/delete', [ 'as' => 'user.delete', 'uses' => 'Admin\UserController@destroy' ])->where('id', '[0-9]+');
    }
);

// User Profile & Settings
Route::get('user/{id}/profile', ['as' => 'profile', 'uses' => 'UserController@profile'])->where('id', '[0-9]+');
Route::post('user/{id}/update', ['as' => 'profile.update', 'uses' => 'UserController@update' ])->where('id', '[0-9]+');

// Meals
Route::get('meal', [ 'as' => 'meal.index', 'uses' => 'MealController@index' ]);
Route::get('meal/create', [ 'as' => 'meal.create', 'uses' => 'MealController@create' ]);
Route::post('meal', [ 'as' => 'meal.store', 'uses' => 'MealController@store' ]);
Route::get('meal/{id}/edit', [ 'as' => 'meal.edit', 'uses' => 'MealController@edit' ])->where('id', '[0-9]+');
Route::post('meal/{id}/update', [ 'as' => 'meal.update', 'uses' => 'MealController@update' ])->where('id', '[0-9]+');
Route::get('meal/{id}/delete', [ 'as' => 'meal.delete', 'uses' => 'MealController@destroy' ])->where('id', '[0-9]+');