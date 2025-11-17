<?php

namespace Src\Auth\Infrastructure\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RoutesServicesProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mapRoutes();
    }

    protected function mapRoutes(): void
    {
        Route::prefix('api/auth')
            ->namespace('') // tu namespace correcto
            ->group(base_path('src/Auth/Infrastructure/Routes/api.php'));
    }
}
