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


//login
Route::get('admin/login', 'Admin\LoginController@login')->name('view-login');
Route::post('admin/login', 'Admin\LoginController@postLogin')->name('login');

//logout
Route::get('admin/logOut', 'Admin\LoginController@logOut')->name('logOut');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    
	Route::get('dashboard', 'Admin\LoginController@index')->name('dashboard');

	Route::resource('user', 'Admin\UserController');
});
