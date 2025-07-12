<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/posts', PostController::class);

Route::apiResource('/tasks', TaskController::class);

Route::get('/pending', [TaskController::class, 'pending']);

Route::post('/register', [AuthController::class, 'register']);