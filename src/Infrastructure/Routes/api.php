<?php


use Illuminate\Support\Facades\Route;
use Src\Infrastructure\Controllers\LoginController;
use Src\Infrastructure\Controllers\RegisterUserController;
use Src\Infrastructure\Controllers\SharedPostController;

Route::post('/login', LoginController::class);
Route::post('/register',RegisterUserController::class);
Route::post('/post',SharedPostController::class);

