<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('autenticateJWT');
Route::post('auth/refresh', [AuthController::class, 'refresh'])->name('auth.refresh')->middleware('autenticateJWT');

Route::post('user', [UserController::class, 'store']);
Route::apiResource('user', UserController::class, ['except' => ['destroy, store'], 'only' => ['index', 'show', 'update']])->middleware('autenticateJWT');

Route::post('category/enable/{category}', [CategoryController::class, 'enable'])->middleware('autenticateJWT');
Route::delete('category/disable/{category}', [CategoryController::class, 'disable'])->middleware('autenticateJWT');
Route::apiResource('category', CategoryController::class, ['except' => ['destroy']])->middleware('autenticateJWT');

Route::post('product/enable/{product}', [ProductController::class, 'enable'])->middleware('autenticateJWT');
Route::delete('product/disable/{product}', [ProductController::class, 'disable'])->middleware('autenticateJWT');
Route::get('product/report/csv/activeProducts', [ProductController::class, 'exportCsvActiveProducts'])->middleware('autenticateJWT');
Route::apiResource('product', ProductController::class, ['except' => ['destroy']])->middleware('autenticateJWT');
