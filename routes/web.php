<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/about', 'HomeController@about');
    Route::get('/films', 'FilmsController@showFilms');

    Route::get('/test/{name}/{email}/{password}', 'HomeController@index');
    Route::get('/categories/{id?}', 'CategoryController@index');


    Route::get('/show_users', 'HomeController@users');
    // Route::group(['middleware' => ['auth:admin', 'AdminRole'], 'prefix' => 'admin'], function () {
    Route::group(['prefix' => 'users'], function () {

        Route::get('/create', 'UserController@createUsers')->name('aa');
        Route::get('/get', 'UserController@getUsers');
        Route::get('/registration', 'UserController@getRegistration');
        Route::post('/registration', 'UserController@postRegistration');
        Route::post('/registration', 'UserController@postRegistration');

    });


    Route::group([ 'prefix' => 'makes'], function () {
        Route::get('/', 'MakesController@index');
    });

    Route::group([ 'prefix' => 'models'], function () {
        Route::get('/', 'ModelsController@index');
    });
    
    Route::group([ 'middleware' => 'staff'], function () {
        Route::group([ 'prefix' => 'models'], function () {
            Route::post('/add', 'ModelsController@addModelPost');
            Route::get('/edit/{id?}', 'ModelsController@edit');
            Route::get('/remove/{id?}', 'ModelsController@remove');
        });
        Route::group([ 'prefix' => 'makes'], function () {
            Route::get('/add', 'MakesController@addMake');
            Route::post('/add', 'MakesController@addMakePost');
            Route::get('/edit/{id?}', 'MakesController@edit');
            Route::get('/remove/{id?}', 'MakesController@remove');
        });
    });
    
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

});

Auth::routes();
// Route::post('/login', 'Auth\LoginController@login');
