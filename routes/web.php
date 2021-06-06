<?php

use Illuminate\Support\Facades\Route;

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
Route::get('test', function(){
    echo 1111;
});


Route::group(['namespace' => 'Auth'], function () {
    Route::group(['middleware' => 'CheckLogIn'], function (){
        Route::group(['prefix' => 'login'], function () {
            Route::get('loginFb', 'authController@loginFb');
            Route::get('/', 'authController@showLogin');
            Route::post('/', 'authController@login');
        });
        Route::group(['prefix' => 'register'], function () {
            Route::get('/', 'authController@showSingUp');
            Route::post('/', 'authController@register');
        });
    });
    // Đăng xuất
    Route::get('logout', 'authController@logout');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'CheckLogOut'], function () {
    Route::group(['prefix' => 'admin'], function () {
        //Todo: URL chính
        Route::get('/', 'indexController@index');
        //Todo: quản lý userx
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'userController@listAll');
            Route::post('add', 'userController@addItem');
            Route::post('update', 'userController@updateItem');
            Route::post('delete', 'userController@deleteItem');
        });
        //Todo: Quản lý nhóm tài khoản
        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', 'groupsController@listAll');
            Route::post('add', 'groupsController@addItem');
            Route::post('update', 'groupsController@updateItem');
            Route::post('delete', 'groupsController@deleteItem');
        });
        //Todo: Erp
        Route::group(['prefix' => 'erp'], function () {
        });
    });

});
//Todo: Nhóm người dùng
Route::group(['namespace' => 'Guest', 'middleware' => 'CheckLogOut'], function () {
    Route::group(['prefix' => 'guest'],function () {
        Route::get('/','guestController@index');

        // Url facebook
        Route::get('facebook', 'facebookController@facebook');

        // Quản lý tin nhắn fb
        Route::group(['prefix' => 'managerMessage'],function () {
            Route::get('/','facebookController@listAllMessage');
            Route::get('/info','facebookController@infoFB');
        });
    });
    //Todo: Tool check thông tin mạng xã hội
    Route::group(['prefix'=>'checkSocial'], function(){
//        Route::get('/', '');
    });
});
