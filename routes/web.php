<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'LoginController@login');

//Auth::routes();


Route::get('/', function () {
    return view('post');
})->where('any', '.*');
