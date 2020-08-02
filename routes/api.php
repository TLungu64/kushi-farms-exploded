<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/inventory', function (Request $request) {
    return $request->inventory();
});


Route::apiResources([
    'user' => 'API\UserController',
    'inventory' => 'API\InventoryController',

]);
Route::get('profile','API\UserController@profile');
Route::get('findUser','API\UserController@search');
Route::put('profile','API\UserController@updateProfile');
Route::get('profile','API\InventoryController@profile');
Route::get('findInventory','API\InventoryController@search');
Route::put('profile','API\InventoryController@updateProfile');