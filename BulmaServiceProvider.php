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
    }

    /**
     * Register the adminlte:install command.
     */
    private function registerInstallCommand()
    {
        $this->app->singleton('command.hesto.bulma.install', function ($app) {
            return $app['Hesto\Adminlte\Commands\BulmaInstallCommand'];
        });

        $this->commands('command.hesto.bulma.install');
    }
}
