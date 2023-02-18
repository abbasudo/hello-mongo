<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);
