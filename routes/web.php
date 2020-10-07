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

//    Route::resource('/category', 'CategoryController');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::get('/add-category', 'CategoryController@create')->name('category.create');
        Route::post('/add-category', 'CategoryController@store')->name('category.store');
        Route::get('/edit-category/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit-category/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/delete-category/{id}','CategoryController@destroy')->name('category.destroy');
    });

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'BrandController@index')->name('brand.index');
        Route::get('/add-brand', 'BrandController@create')->name('brand.create');
        Route::post('/add-brand', 'BrandController@store')->name('brand.store');
        Route::get('/edit-brand/{id}', 'BrandController@edit')->name('brand.edit');
        Route::post('/edit-brand/{id}', 'BrandController@update')->name('brand.update');
        Route::get('/delete-brand/{id}','BrandController@destroy')->name('brand.destroy');
    });

    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', 'SubCategoryController@index')->name('subcategory.index');
        Route::get('/add-subcategory', 'SubCategoryController@create')->name('subcategory.create');
        Route::post('/add-subcategory', 'SubCategoryController@store')->name('subcategory.store');
        Route::get('/edit-subcategory/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/edit-subcategory/{id}', 'SubCategoryController@update')->name('subcategory.update');
        Route::get('/delete-subcategory/{id}','SubCategoryController@destroy')->name('subcategory.destroy');
    });

    
    Route::group(['prefix' => 'product'], function () {
        Route::get('get/subcategory/{category_id}', 'ProductController@get_subcategory');
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('add-product', 'ProductController@create')->name('product.create');
        Route::post('/add-product', 'ProductController@store')->name('product.store');
        Route::get('/edit-product/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/edit-product/{id}', 'ProductController@update')->name('product.update');
        Route::get('/delete-product/{id}','ProductController@destroy')->name('product.destroy');
    });
});
