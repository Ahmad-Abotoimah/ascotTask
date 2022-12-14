<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');

});
Route::get('user', 'App\Http\Controllers\AuthController@user')->middleware('auth');
Route::post('product', 'App\Http\Controllers\ProductController@addProduct')->middleware('auth');
Route::post('options', 'App\Http\Controllers\ProductController@addOptions')->middleware('auth');
Route::post('coupon', 'App\Http\Controllers\CouponController@addCoupon')->middleware('auth');