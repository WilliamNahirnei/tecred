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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('category/enable/{category}',[CategoryController::class, 'enable']);
Route::delete('category/disable/{category}',[CategoryController::class, 'disable']);
Route::apiResource('category', CategoryController::class, ['except' => ['destroy']]);

Route::post('product/enable/{product}',[ProductController::class, 'enable']);
Route::delete('product/disable/{product}',[ProductController::class, 'disable']);
Route::apiResource('product', ProductController::class, ['except' => ['destroy']]);
