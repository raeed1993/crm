<?php

namespace App\Providers;


use App\BL\IServices\IAuthService;
use App\BL\Services\AuthService;
use Illuminate\Support\ServiceProvider;

class InitProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(IAuthService::class, function () {
            return new AuthService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
