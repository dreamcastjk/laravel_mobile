<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('home');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/basket', 'BasketController@basket')->name('basket');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product:code}', 'MainController@product')->name('product');
Route::get('/basket/place', 'BasketController@basketPlace')->name('basketPlace');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
