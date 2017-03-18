<?php

namespace App\Providers;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // register the service provider for the Debugbar if we are currently
        // in a debuggable environment
        if(config("app.debug")) {
            $this->app->register(
                'Barryvdh\Debugbar\ServiceProvider'
            );
        }
    }
}
