<?php

namespace Monurakkaya\FormGroup\Providers;

use Illuminate\Support\Facades\Blade;
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

        $this->loadViewsFrom(__DIR__.'/../../resources/views/components/formgroup', 'laravel-formgroup');

        $this->publishes([
            __DIR__.'/../../public' => public_path('')
        ], 'laravel-formgroup');

        Blade::component('laravel-formgroup::formgroup', 'formgroup');
        Blade::directive('submit', function () {
            return '<button type="submit" class="btn btn-primary">Kaydet</button>';
        });


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
