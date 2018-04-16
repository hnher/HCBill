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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {

        Route::group(['prefix'=>'login'], function () {

            Route::get('/', 'LoginController@index');

            Route::post('login', 'LoginController@login');

            Route::get('logout', 'LoginController@logout');
        });

        Route::group(['middleware'=>['login']], function () {

            Route::get('/', 'IndexController@index');

            Route::group(['prefix'=>'bill'], function() {

                Route::get('/', 'BillController@index');

                Route::get('add', 'BillController@add');

                Route::post('store', 'BillController@store');

                Route::get('edit/{id}', 'BillController@edit');

                Route::get('delete/{id}', 'BillController@delete');

                Route::get('export', 'BillController@export');
            });

            Route::group(['prefix'=>'project'], function () {

                Route::get('/', 'ProjectController@index');

                Route::get('add', 'ProjectController@add');

                Route::post('store', 'ProjectController@store');

                Route::get('edit/{id}', 'ProjectController@edit');

                Route::get('delete/{id}', 'ProjectController@delete');
            });

            Route::group(['prefix'=>'handle'], function () {

                Route::get('add', 'HandleController@add');

                Route::get('/', 'HandleController@index');

                Route::get('edit/{id}', 'HandleController@edit');

                Route::post('store', 'HandleController@store');

                Route::get('delete/{id}', 'HandleController@delete');
            });

        });

    });

Route::group(['prefix'=>'/', 'namespace'=>'Home'], function () {

        Route::get('/', 'BillController@add');

        Route::post('store', 'BillController@store');
});