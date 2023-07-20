<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// public routes
Route::get('/get-main-categories', [CategoryController::class,'index']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{product}',[ProductController::class,'show']);
Route::get('/product/search/{name}',[ProductController::class,'search']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

// protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/product',[ProductController::class,'store']);
    Route::put('/product/{product}',[ProductController::class,'update']);
    Route::delete('/product/{product}',[ProductController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});