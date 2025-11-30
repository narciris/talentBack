<?php

use Illuminate\Support\Facades\Route;
use Src\Infrastructure\Controllers\SharedPostController;


// Rutas protegidas por auth:sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    Route::middleware('role:admin')->group(function () {
        Route::post('/', SharedPostController::class);
    });
    
});
