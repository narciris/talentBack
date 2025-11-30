<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Repositories\PostInterfaceRepository;
use Src\Domain\Repositories\UserInterfaceRepository;
use Src\Infrastructure\EloquentRepositories\EloquentPostRepositoryImpl;
use Src\Infrastructure\EloquentRepositories\EloquentUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterfaceRepository::class,EloquentUserRepository::class);
        $this->app->bind(PostInterfaceRepository::class,EloquentPostRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
