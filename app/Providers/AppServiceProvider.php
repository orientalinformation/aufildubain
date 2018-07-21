<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }

        $this->app->singleton(\App\Services\UtilsService::class, function ($app) {
            return new \App\Services\UtilsService();
        });

        $this->app->singleton(\App\Services\TrendsService::class, function ($app) {
            return new \App\Services\TrendsService();
        });

        $this->app->singleton(\App\Services\ProductsService::class, function ($app) {
            return new \App\Services\ProductsService();
        });

        $this->app->singleton(\App\Services\CategoriesService::class, function ($app) {
            return new \App\Services\CategoriesService();
        });

        $this->app->singleton(\App\Services\StoresService::class, function ($app) {
            return new \App\Services\StoresService();
        });

        $this->app->singleton(\App\Services\BrandsService::class, function ($app) {
            return new \App\Services\BrandsService();
        });
    }
}
