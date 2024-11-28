<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'Lang'], function () {
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('', 'AuthController@index');
        //Route::middleware('auth')->group(function () {
            Route::group(['prefix' => 'categories'], function () {
                Route::get('', 'CategoryController@index');
                Route::post('store', 'CategoryController@store');
                Route::post('update', 'CategoryController@update');
                Route::post('destroy', 'CategoryController@destroy');
            });
            Route::group(['prefix' => 'products'], function () {
                Route::get('', 'ProductController@index');
                Route::post('store', 'ProductController@store');
                Route::post('update', 'ProductController@update');
                Route::post('destroy', 'ProductController@destroy');
            });
            Route::group(['prefix' => 'offers'], function () {
                Route::get('', 'OfferController@index');
                Route::post('store', 'OfferController@store');
                Route::post('update', 'OfferController@update');
                Route::post('destroy', 'OfferController@destroy');
            });
            Route::group(['prefix' => 'settings'], function () {
                Route::get('', 'HomePageDetailController@index');
                Route::post('store', 'HomePageDetailController@store');
                Route::post('update', 'HomePageDetailController@update');
                Route::post('destroy', 'HomePageDetailController@destroy');
            });
            Route::group(['prefix' => 'orders'], function () {
                Route::get('', 'OrderController@index');
                Route::post('destroy', 'OrderController@destroy');
                Route::post('update', 'OrderController@update');
                Route::get('{id}', 'OrderController@show');
            });
            Route::group(['prefix' => 'users'], function () {
                Route::get('', 'UserController@index');
                Route::post('store', 'UserController@store');
                Route::post('update', 'UserController@update');
                Route::post('destroy', 'UserController@destroy');
                Route::get('{id}', 'UserController@show');
            });
            Route::group(['prefix' => 'messages'], function () {
                Route::get('', 'MessageController@index');
                Route::post('destroy', 'MessageController@destroy');
            });
            Route::group(['prefix' => 'clients'], function () {
                Route::get('', 'ClientController@index');
                Route::post('store', 'ClientController@store');
                Route::post('update', 'ClientController@update');
                Route::post('destroy', 'ClientController@destroy');
            });
            Route::get('profile', 'AuthController@profile');
        //});
    });
});
