<?php

namespace Src\Infrastructure\Services;

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
            ->group(base_path('src/Infrastructure/Routes/api.php'));

        Route::prefix('api/post')
            ->namespace('')
            ->group(base_path('src/Infrastructure/Routes/post.php'));
             Route::prefix('api/bonos')
            ->namespace('')
            ->group(base_path('src/Infrastructure/Routes/bonos.php'));
            Route::prefix('api/users')

            ->namespace('')
            ->group(base_path('src/Infrastructure/Routes/users.php'));
    }
}
