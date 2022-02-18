<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);

Route::apiResource('tags', TagController::class);
