<?php

namespace Ecoflow\Media;

use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    public function register()
    {
        # code...
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }
}
