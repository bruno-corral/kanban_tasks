<?php

use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('boards', BoardController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('tasks', TaskController::class);
});
