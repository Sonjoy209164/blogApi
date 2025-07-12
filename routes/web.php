<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::view('/api_test', 'api_test');  // Route for testing the API UI

// Redirect root to the api_test page
Route::get('/', function () {
    return redirect('/api_test');  // Redirect to /api_test directly
});

