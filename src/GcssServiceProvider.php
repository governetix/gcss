<?php

namespace Governetix\Gcss;

use Illuminate\Support\ServiceProvider;

class GcssServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/gcss.php', 'gcss'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/gcss.php' => config_path('gcss.php'),
        ], 'gcss-config');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/gcss'),
        ], 'gcss-assets');
    }
}
