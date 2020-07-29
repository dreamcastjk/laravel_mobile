<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/mobiles/{product?}', 'MainController@product')->name('product');
