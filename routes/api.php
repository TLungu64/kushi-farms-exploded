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
Route::middleware('auth:api')->get('/stock', function (Request $request) {
    return $request->stock();
});
Route::middleware('auth:api')->get('/inventory', function (Request $request) {
    return $request->inventory();
});


Route::apiResources([
    'user' => 'API\UserController',
    'stock' => 'API\StockController',
    'inventory' => 'API\InventoryController',
    'dashboard' => 'API\DashboardController',

]);
Route::get('profile','API\UserController@profile');
Route::get('findUser','API\UserController@search');
Route::put('profile','API\UserController@updateProfile');

Route::get('findInventory','API\InventoryController@search');

Route::get('findStock','API\StockController@search');

