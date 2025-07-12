<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Api\TaskController;

Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
Route::get('/tasks/pending', [TaskController::class, 'pending']);

use App\Http\Controllers\PostController;

Route::post('/posts', [PostController::class, 'store']);         // Create a post
Route::get('/posts', [PostController::class, 'index']);          // List all posts
Route::get('/posts/{id}', [PostController::class, 'show']);      // View single post

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
