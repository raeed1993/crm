<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

//        Livewire::setUpdateRoute(function ($handle){
//            return Route::post('livewire/update', $handle)->middleware('web');
//        });
//
//        Livewire::setScriptRoute(function ($handle){
//            return Route::post('livewire/livewire.js', $handle)->middleware('web');
//        });

    }
}
