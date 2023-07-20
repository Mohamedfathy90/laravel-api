<?php

use App\Http\Controllers\CategoryController;
<<<<<<< HEAD
use App\Models\Category;
=======
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
>>>>>>> f326ad02bc2940e9faf4af3f42194ae5ed3255fc
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

<<<<<<< HEAD
Route::get('/get-main-categories', [CategoryController::class,'index']);
=======

Route::resource('/product',ProductController::class);
Route::get('/product/search/{name}',[ProductController::class,'search']);

>>>>>>> f326ad02bc2940e9faf4af3f42194ae5ed3255fc
