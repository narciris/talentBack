<?php


use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\LoginController;
use Src\Auth\Infrastructure\Controllers\RegisterUserController;
use Src\Auth\Infrastructure\Controllers\SharedPostController;

Route::post('/login', LoginController::class);
Route::post('/register',RegisterUserController::class);
Route::post('/post',SharedPostController::class);

