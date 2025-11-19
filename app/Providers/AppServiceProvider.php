<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Auth\Domain\Repositories\PostInterfaceRepository;
use Src\Auth\Domain\Repositories\UserInterfaceRepository;
use Src\Auth\Infrastructure\EloquentRepositories\EloquentPostRepositoryImpl;
use Src\Auth\Infrastructure\EloquentRepositories\EloquentUserRepository;

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
