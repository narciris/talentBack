<?php

use Illuminate\Support\Facades\Route;
use Src\Infrastructure\Controllers\BonosController;
use Src\Infrastructure\Controllers\BlockBondsController;



// Rutas protegidas por auth:sanctum
    
    Route::get('/',BonosController::class);
    Route::post('/{userId}/bloquear/{bonoId}',BlockBondsController::class);
    

