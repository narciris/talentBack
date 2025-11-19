<?php

use Illuminate\Support\Facades\Route;
use Src\Auth\Infrastructure\Controllers\SharedPostController;

Route::middleware('auth:sanctum')->post('/', SharedPostController::class);
