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

Route::get('/', 'UsersController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');    

// ログイン関連
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // 退会確認画面：URLのIDを削除した時にエラーを出さないために、Routeの優先度を考慮して、」user.showよりも前に実装
Route::group(['middleware' => 'auth'], function () {
    Route::put('users', 'UsersController@rename')->name('rename');
    Route::get('users/confirm', 'UsersController@destroyConfirm')->name('confirm.destroy');
    Route::delete('users', 'UsersController@destroy')->name('users.destroy');
});

Route::resource('users', 'UsersController', ['only' => ['show']]);

Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('followings', 'UsersController@followings')->name('followings');
    Route::get('followers', 'UsersController@followers')->name('followers');
    });
    
Route::resource('rest','RestappController', ['only' => ['index', 'show', 'create', 'store', 'destroy']]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });    
    
    Route::resource('movies', 'MoviesController', ['only' => ['create', 'store', 'destroy']]);

    
});