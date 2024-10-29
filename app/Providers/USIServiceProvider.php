<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\USIService;

class USIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(USIService::class, function ($app) {
            return new USIService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
