<?php
use App\Http\Controllers\PostController;

Route::post('/posts', [PostController::class, 'store']);         // Create a post
Route::get('/posts', [PostController::class, 'index']);          // List all posts
Route::get('/posts/{id}', [PostController::class, 'show']);      // View single post

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
