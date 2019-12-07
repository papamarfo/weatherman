<?php

namespace Manford\Weatherman;

use Illuminate\Support\ServiceProvider;
use Manford\Weatherman\Weatherman;

class WeathermanServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'manford');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/weatherman.php', 'weatherman');

        $this->app->singleton('weatherman', function() {
            return new Weatherman();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['weatherman'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/weatherman.php' => config_path('weatherman.php'),
        ], 'weatherman.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/weatherman'),
        ], 'weatherman.views');
    }
}