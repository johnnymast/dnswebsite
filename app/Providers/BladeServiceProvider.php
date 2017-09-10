<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('notification', function() {
            return session()->has('flash_message');
        });
     }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
