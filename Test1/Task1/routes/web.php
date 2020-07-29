<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/shopping', 'ShoppingController@out' )->name('shopping');

Route::post('/shopping/raport', 'RaportController@out' )->name('raport');
