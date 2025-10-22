<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/authors', [AuthorController::class, 'index']);;
Route::get('/authors/{id}', [AuthorController::class, 'show']);;


Route::get('/books', [BookController::class, 'index']);;

Route::get('/genres', [GenreController::class, 'index']);;
Route::get('/genres/{id}', [GenreController::class, 'show']);;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware(['auth:api'])->group(function (){

    Route::middleware(['role:admin'])->group(function(){

        Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']);
    
        Route::post('/authors', [AuthorController::class, 'store']);;
        Route::put('/authors/{id}', [AuthorController::class, 'update']);;
        Route::delete('/authors/{id}', [GenreController::class, 'destroy']);;
    
        Route::post('/genres', [GenreController::class, 'store']);;
        Route::put('/genres/{id}', [GenreController::class, 'update']);;
        Route::delete('/genres/{id}', [GenreController::class, 'destroy']);;
    });
});
