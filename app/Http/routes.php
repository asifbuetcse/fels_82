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
Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Auth', 'prefix' => 'auth','as' => 'auth'], function() {
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
    Route::get('register', 'AuthController@getRegister');
    Route::post('register', 'AuthController@postRegister');
});
Route::resource('users', 'UsersController', ['only' => ['index']]);
Route::resource('categories', 'CategoriesController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
Route::resource('questions', 'QuestionsController', ['only' => ['index']]);
Route::resource('answers', 'AnswersController', ['only' => ['index', 'store']]);
Route::resource('lessons', 'LessonsController', ['only' => ['index', 'store']]);
Route::get('home', function () {
    return view('home');
});


