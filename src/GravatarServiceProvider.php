<?php

namespace Andriymiz\Gravatar;

use Illuminate\Support\ServiceProvider;

class GravatarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/gravatar.php',
            'gravatar'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/gravatar.php' => config_path('gravatar.php')
        ], 'config');
    }
}
