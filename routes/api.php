<?php

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


Route::get('/get-main-categories', [CategoryController::class,'index']);
Route::resource('/product',ProductController::class);
Route::get('/product/search/{name}',[ProductController::class,'search']);

