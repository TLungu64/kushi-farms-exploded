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

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/our-story', function () {
    return view('our-story');
});


Route::get('/contact-us', function () {
    return view('contact-us');
});



Route::get('/our-produce', function () {
    return view('our-produce');
});


Route::get('/pricing', function () {
    return view('pricing');
})->middleware('auth');

    Auth::routes(['verify' => true]);
    
Route::get('/home', 'HomeController@index')->name('home');
    Route::get('{any}', function () {
        return view('home');
    })->where('any','.*');