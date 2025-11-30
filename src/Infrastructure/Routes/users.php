<?php

use Illuminate\Support\Facades\Route;
use Src\Infrastructure\Controllers\GetAllUsersController;

Route::get('/',GetAllUsersController::class);