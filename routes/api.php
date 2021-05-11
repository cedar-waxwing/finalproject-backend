<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [UserController::class, 'create']);

Route::group(['middleware' => ['auth:api']], function () {
    // gets user with all order data
    Route::get('/user', [UserController::class, 'index']);
    // log out user
    Route::get('/logout', [UserController::class, 'logout']);
    //create posts
    Route::post('/post/create', [PostController::class, 'create']);
    //get my posts when logged in
    Route::get('/posts/my', [PostController::class, 'myposts']);
});

Route::get('/posts/all', [PostController::class, 'index']);

Route::post('/search', [PostController::class, 'search']);

// Route::post('/posts/update/{id}', [PostController::class, 'update']);

// Route::get('/posts/destroy/{id}', [PostController::class, 'destroy']);
