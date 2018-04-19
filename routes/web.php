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

/**
 * 后台
 */
Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {

        Route::group(['prefix'=>'login'], function () {

            Route::get('/', 'LoginController@index');

            Route::post('login', 'LoginController@login');

            Route::get('logout', 'LoginController@logout');
        });

        Route::group(['middleware'=>['login']], function () {

            Route::get('/', 'BillController@index');

            /**
             * 账单管理
             */
            Route::group(['prefix'=>'bill'], function() {

                Route::get('/', 'BillController@index');

                Route::get('add', 'BillController@add');

                Route::match(['post', 'put'], 'store', 'BillController@store');

                Route::get('edit/{id}', 'BillController@edit');

                Route::get('delete/{id}', 'BillController@delete');

                Route::get('export', 'BillController@export');
            });

            /**
             * 项目管理
             */
            Route::group(['prefix'=>'project'], function () {

                Route::get('/', 'ProjectController@index');

                Route::get('add', 'ProjectController@add');

                Route::match(['post', 'put'], 'store', 'ProjectController@store');

                Route::get('edit/{id}', 'ProjectController@edit');

                Route::get('delete/{id}', 'ProjectController@delete');
            });

            /**
             * 经手人管理
             */
            Route::group(['prefix'=>'handle'], function () {

                Route::get('add', 'HandleController@add');

                Route::get('/', 'HandleController@index');

                Route::get('edit/{id}', 'HandleController@edit');

                Route::match(['post', 'put'], 'store', 'HandleController@store');

                Route::get('delete/{id}', 'HandleController@delete');
            });

            /**
             * 后台登陆用户自己修改信息操作
             */
            Route::group(['prefix'=>'user'], function () {

                Route::get('edit', 'UserController@edit');

                Route::put('update', 'UserController@update');
            });

            /**
             * 会员管理
             */
            Route::group(['prefix'=>'member'], function () {

                Route::get('add', 'MemberController@add');

                Route::match(['post', 'put'], 'store', 'MemberController@store');

                Route::get('/', 'MemberController@index');

                Route::get('edit/{id}', 'MemberController@edit');

                Route::get('delete/{id}', 'MemberController@delete');

                Route::get('show/{id}', 'MemberController@show');
            });

            Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
        });

    });

/**
 * 前台
 */
Route::group(['prefix'=>'/', 'namespace'=>'Home'], function () {

        Route::get('/', 'BillController@add');

        Route::post('store', 'BillController@store');
});