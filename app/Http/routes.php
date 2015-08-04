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
// Login
Route::get('auth/login', [
        'as' => 'login',
        'uses' => 'Auth\AuthController@getLogin'
    ]
);
Route::post('auth/login', [
        'as' => 'postlogin',
        'uses' => 'Auth\AuthController@postLogin'
    ]
);
Route::get('auth/logout', [
        'as' => 'logout',
        'uses' => 'Auth\AuthController@getLogout'
    ]
);
// Register
Route::get('auth/register', [
        'as' => 'register',
        'uses' => 'Auth\AuthController@getRegister'
    ]
);
Route::post('auth/register', [
        'as' => 'postregister',
        'uses' => 'Auth\AuthController@postRegister'
    ]
);

Route::get('/', ['as' => 'home', function () {
    return view('welcome');
}]);

Route::resource('meal',  'MealController');
