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

Route::get('/about-us', function () {
    return view('about-us.html');
});

Route::get('/login', function () {
    return view('login.html');
});

Route::get('/contact-us', function () {
    return view('contact-us.html');
});


Route::get('/registration', function () {
    return view('registration.html');
});

Route::get('/features', function () {
    return view('features.html');
});


Route::get('/pricing', function () {
    return view('pricing.html');
});

/*	Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
