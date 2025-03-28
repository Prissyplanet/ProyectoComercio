<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\IndexController;



Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products',ProductsController::class);
Route::resource('index',IndexController::class);

