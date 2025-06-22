<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArticleApiController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/articles', [ArticleApiController::class, 'index']);
Route::get('/articles/{article}', [ArticleApiController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
Route::post('/articles', [ArticleApiController::class, 'store']);
Route::put('/articles/{article}', [ArticleApiController::class, 'update']);
Route::delete('/articles/{article}', [ArticleApiController::class, 'destroy']);
});
