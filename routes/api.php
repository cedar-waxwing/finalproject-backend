<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostingController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [UserController::class, 'create']);

Route::get('/postings/all', [PostingController::class, 'index']); 

Route::post('/postings/update/{id}', [PostingController::class, 'update']); 

Route::post('/postings/create', [PostingController::class, 'create']); 

Route::get('/postings/destroy/{id}', [PostingController::class, 'destroy']);

