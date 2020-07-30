<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('home');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product:code}', 'MainController@product')->name('product');
Route::get('/basket', 'MainController@basket')->name('basket');
Route::get('/basket/place', 'MainController@basketPlace')->name('basketPlace');
