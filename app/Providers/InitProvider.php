<?php

namespace App\Providers;


use App\BL\IServices\IAuthService;
use App\BL\IServices\ICompanyService;
use App\BL\IServices\IImportService;
use App\BL\IServices\IProjectService;
use App\BL\IServices\ITaskService;
use App\BL\IServices\IUserService;
use App\BL\Services\AuthService;
use App\BL\Services\CompanyService;
use App\BL\Services\ImportService;
use App\BL\Services\ProjectService;
use App\BL\Services\TaskService;
use App\BL\Services\UserService;
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

        $this->app->singleton(ICompanyService::class, function () {
            return new CompanyService();
        });

        $this->app->singleton(IImportService::class, function () {
            return new ImportService();
        });

        $this->app->singleton(IUserService::class, function () {
            return new UserService();
        });

        $this->app->singleton(ITaskService::class, function () {
            return new TaskService();
        });
        
        $this->app->singleton(IProjectService::class, function () {
            return new ProjectService();
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
