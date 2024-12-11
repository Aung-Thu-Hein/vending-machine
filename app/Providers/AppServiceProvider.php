<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Service binding
        $this->app->bind('App\Contracts\Services\Product\ProductService', 'App\Services\Product\ProductService');

        //Dao binding
        $this->app->bind('App\Contracts\Dao\Product\ProductDao', 'App\Dao\Product\ProductDao');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
