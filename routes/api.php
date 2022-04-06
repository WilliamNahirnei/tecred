<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('category/enable/{category}', [CategoryController::class, 'enable']);
Route::delete('category/disable/{category}', [CategoryController::class, 'disable']);
Route::apiResource('category', CategoryController::class, ['except' => ['destroy']]);

Route::post('product/enable/{product}', [ProductController::class, 'enable']);
Route::delete('product/disable/{product}', [ProductController::class, 'disable']);
Route::get('product/report/csv/activeProducts', [ProductController::class, 'exportCsvActiveProducts']);
Route::apiResource('product', ProductController::class, ['except' => ['destroy']]);
