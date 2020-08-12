<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);


Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('/orders', 'OrderController@index')->name('index');
});

Route::get('/', 'MainController@index')->name('home');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/basket', 'BasketController@basket')->name('basket');
Route::get('/basket/place', 'BasketController@basketPlace')->name('basketPlace');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product:code}', 'MainController@product')->name('product');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/confirm', 'BasketController@basketConfirm')->name('basket-confirm');
