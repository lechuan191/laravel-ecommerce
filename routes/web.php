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
Route::get('/user/logout', 'HomeController@logout')->name('user.logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login');
    Route::get('/home', 'AdminController@index')->name('admin.home');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/change-password', 'AdminController@showChangePassword')->name('admin.change.pass');
    Route::post('/change-password', 'AdminController@changePassword')->name('admin.change.updatePass');

//    Route::resource('/category', 'CategoryController');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\CategoryController@index')->name('category.index');
        Route::get('/add-category', 'Admin\CategoryController@create')->name('category.create');
        Route::post('/add-category', 'Admin\CategoryController@store')->name('category.store');
        Route::get('/edit-category/{id}', 'Admin\CategoryController@edit')->name('category.edit');
        Route::post('/edit-category/{id}', 'Admin\CategoryController@update')->name('category.update');
        Route::get('/delete-category/{id}','Admin\CategoryController@destroy')->name('category.destroy');
    });

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'Admin\BrandController@index')->name('brand.index');
        Route::get('/add-brand', 'Admin\BrandController@create')->name('brand.create');
        Route::post('/add-brand', 'Admin\BrandController@store')->name('brand.store');
        Route::get('/edit-brand/{id}', 'Admin\BrandController@edit')->name('brand.edit');
        Route::post('/edit-brand/{id}', 'Admin\BrandController@update')->name('brand.update');
        Route::get('/delete-brand/{id}','Admin\BrandController@destroy')->name('brand.destroy');
    });

    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', 'Admin\SubCategoryController@index')->name('subcategory.index');
        Route::get('/add-subcategory', 'Admin\SubCategoryController@create')->name('subcategory.create');
        Route::post('/add-subcategory', 'SubCategoryController@store')->name('subcategory.store');
        Route::get('/edit-subcategory/{id}', 'Admin\SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/edit-subcategory/{id}', 'Admin\SubCategoryController@update')->name('subcategory.update');
        Route::get('/delete-subcategory/{id}','Admin\SubCategoryController@destroy')->name('subcategory.destroy');
    });


    Route::group(['prefix' => 'product'], function () {
        Route::get('get/subcategory/{category_id}', 'Admin\ProductController@get_subcategory');
        Route::get('/', 'Admin\ProductController@index')->name('product.index');
        Route::get('add-product', 'Admin\ProductController@create')->name('product.create');
        Route::post('/add-product', 'Admin\ProductController@store')->name('product.store');
        Route::get('/edit-product/{id}', 'Admin\ProductController@edit')->name('product.edit');
        Route::post('/edit-product/{id}', 'Admin\ProductController@update')->name('product.update');
        Route::post('/edit-product-image/{id}', 'Admin\ProductController@updateImage')->name('product.update.image');
        Route::get('/delete-product/{id}','Admin\ProductController@destroy')->name('product.destroy');
        Route::get('/change-status','Admin\ProductController@changeStatus')->name('product.change.status');
    });
});
Route::get('cart/product/view/{id}', 'CartController@viewProduct');
Route::post('add/cart', 'CartController@addToCartModal')->name('add.cart');
Route::get('check', 'CartController@check');
Route::get('remove/cart{id}', 'CartController@removeCart')->name('remove.cart');
Route::get('show/cart', 'CartController@showCart')->name('show.cart');
Route::post('update/cart', 'CartController@updateQuantityCart')->name('update.cart');



Route::get('product/details/{id}', 'ProductController@productDetail')->name('product.details');
Route::post('product/details/add/cart/{id}', 'ProductController@addToCartDetail');
