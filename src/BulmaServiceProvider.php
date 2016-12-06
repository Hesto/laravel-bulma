<?php

namespace Hesto\LaravelBulma;

use Illuminate\Support\ServiceProvider;

class BulmaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInstallCommand();
        $this->registerDependenciesCommand();
    }

    /**
     * Register the bulma:install command.
     */
    private function registerInstallCommand()
    {
        $this->app->singleton('command.hesto.bulma.install', function ($app) {
            return $app['Hesto\LaravelBulma\Commands\BulmaInstallCommand'];
        });

        $this->commands('command.hesto.bulma.install');
    }

    /**
     * Register the bulma:install command.
     */
    private function registerDependenciesCommand()
    {
        $this->app->singleton('command.hesto.bulma.dependencies', function ($app) {
            return $app['Hesto\LaravelBulma\Commands\BulmaInstallDependenciesCommand'];
        });

        $this->commands('command.hesto.bulma.dependencies');
    }
}
