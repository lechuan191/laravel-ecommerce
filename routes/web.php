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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontController@index')->name('index');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login');
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout'); 
    Route::get('/change-password', 'AdminController@showChangePassword')->name('admin.change.pass');
    Route::post('/change-password', 'AdminController@changePassword')->name('admin.change.updatePass');

    Route::resource('/category', 'CategoryController');
});