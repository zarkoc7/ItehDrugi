<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController1;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController1::class,'index']);
Route::get('/users/{id}', [UserController1::class,'show']);

Route::get('/products', [ProductController::class,'index']);
Route::get('/products/{id}', [ProductController::class,'show']);

Route::get('/categories', [CategoryController::class,'index']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);



