<?php

/* AUTH */
Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false,]);
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

/* GROUP */
Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/orders', 'OrderController@index')->name('index');
    });
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
});

/* GROUP */
Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
});
Route::group([
    'middleware' => 'basket_not_empty',
    'prefix' => 'basket',
], function () {
    Route::get('/', 'BasketController@basket')->name('basket');
    Route::get('/place', 'BasketController@basketPlace')->name('basketPlace');
    Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
    Route::post('/confirm', 'BasketController@basketConfirm')->name('basket-confirm');
});

/* GET */
Route::get('/', 'MainController@index')->name('home');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product:code}', 'MainController@product')->name('product');
