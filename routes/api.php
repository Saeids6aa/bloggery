<?php

use App\Http\Controllers\Api\About_usConroller;
use App\Http\Controllers\Api\categoryController;
use App\Http\Controllers\Api\CommentsConroller;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SettingConroller;
use App\Http\Controllers\ApiControllers\auth\AuthController;

use App\Http\Resources\categoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user',   [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    
Route::get('/categories', [categoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/tags', [categoryController::class, 'index']);
Route::get('/tags/{id}', [CategoryController::class, 'show']);
Route::delete('/tags/{id}', [CategoryController::class, 'destroy']);


// Route::get('/comments', [CommentsConroller::class, 'index']);
// Route::get('/comments/{id}', [CommentsConroller::class, 'show']);
// Route::delete('/comments/{id}', [CommentsConroller::class, 'destroy']);

Route::get('/Settings', [SettingConroller::class, 'index']);

Route::get('/AboutUs', [About_usConroller::class, 'index']);



});
