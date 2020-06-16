<?php

namespace ErpNET\SCartVideoPlugin\Providers;

use Illuminate\Support\ServiceProvider;

class TServiceProvider extends ServiceProvider
{
    protected $commands = [
        \ErpNET\SCartVideoPlugin\Console\Commands\Install::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;

        $projectRootDir = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;

        //Publish Config
        $this->publishes([
            $projectRootDir.'src/public/Plugins/Other/VideoPlugin' => public_path('Plugins/Other/VideoPlugin'),
            $projectRootDir.'src/Plugins/Other/VideoPlugin' => app_path('Plugins/Other/VideoPlugin'),         
        ], 'erpnetVideoPlugin');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register the artisan commands
        $this->commands($this->commands);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
