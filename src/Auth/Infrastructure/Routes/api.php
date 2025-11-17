<?php


use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\LoginController;
use Src\Auth\Infrastructure\Controllers\RegisterUserController;

Route::post('/login', LoginController::class);
Route::post('/register',RegisterUserController::class);

