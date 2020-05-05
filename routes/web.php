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
    return view('about-us');
});


Route::get('/contact-us', function () {
    return view('contact-us');
});



Route::get('/features', function () {
    return view('features');
});


Route::get('/pricing', function () {
    return view('pricing');
})->middleware('auth');

	Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
