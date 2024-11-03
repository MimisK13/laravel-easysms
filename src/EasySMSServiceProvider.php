<?php

namespace Mimisk13\LaravelEasySMS;

use Illuminate\Support\ServiceProvider;

class EasySMSServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mimisk13');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'mimisk13');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/easysms.php', 'easysms');

        // Register the service the package provides.
        $this->app->singleton('easysms', function ($app) {
            return new EasySMS($app['config']->get('easysms'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-easysms'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/easysms.php' => config_path('easysms.php'),
        ], 'easysms.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mimisk13'),
        ], 'laravel-easysms.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mimisk13'),
        ], 'laravel-easysms.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mimisk13'),
        ], 'laravel-easysms.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
