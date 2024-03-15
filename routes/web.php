<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('home');
    Route::get('/book/add', [BookController::class, 'create']);
    Route::post('/book/add', [BookController::class, 'store']);
    Route::get('/book/{id}/edit', [BookController::class, 'edit']);
    Route::put('/book/{id}/edit', [BookController::class, 'update']);
    Route::delete('/book/{id}', [BookController::class, 'destroy']);
    Route::get('/book/{id}', [BookController::class, 'show']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/add', [CategoryController::class, 'create']);
    Route::post('/category/add', [CategoryController::class, 'store']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id}/edit', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);

    Route::post('/logout', [LoginController::class, 'logout']);
});
