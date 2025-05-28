<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;


Route::post('/login', [LoginController::class, 'login'])->name('login')->withoutMiddleware(['throttle:api']);
Route::post('/register', [RegisterController::class, 'register'])->name('register')->withoutMiddleware(['throttle:api']);
Route::get('/categories',[CategoryController::class,'index'])->withoutMiddleware(['throttle:api']);
Route::get('/products', [ProductController::class, 'apiIndex'])->withoutMiddleware(['throttle:api']);
Route::get('/products/{id}', [ProductController::class, 'apiShow'])->withoutMiddleware(['throttle:api']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::prefix('user')->group(function(){
        Route::get('/', function(Request $request){
            return $request->user()->load('favorites');
        });
        Route::put('/', [ProfileController::class, 'update'])->withoutMiddleware(['throttle:api']);
        Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->withoutMiddleware(['throttle:api']);
    });
    Route::prefix('favorites')->group(function () {
        Route::get('/', [FavoriteController::class, 'index']);
        Route::post('/{product}', [FavoriteController::class, 'store']);
        Route::delete('/{product}', [FavoriteController::class, 'destroy']);
    });



});
