<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    $user = session('user');
    if ($user){
        return redirect()->route('userData');
    }  else { 
        return view('authorization');
    }
})->name("authorization");

Route::post('/user', 'UserController@out')->name("user");

Route::get('/user/Data',function (Request $request) {
    $user = session('user');
    if (!$user){
        return redirect()->route('authorization');
    }  else { 
        return view('userData');
    }
})->name("userData");

Route::get('/userClear', function () {
    Session::put('user','');
    return redirect()->route('authorization');
})->name("userClear");