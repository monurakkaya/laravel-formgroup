<?php

namespace Monurakkaya\FormGroup\Providers;

use Illuminate\Support\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laravel-formgroup');

        $this->publishes([
           __DIR__.'/../../resources/views/' => resource_path('views/')
        ], 'laravel-formgroup-views');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
