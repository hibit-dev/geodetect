<?php

namespace Hibit\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Class GeoDetect
 * @package Hibit\GeoDetect
 */
class GeoDetectServiceProvider extends ServiceProvider
{
    // php artisan vendor:publish --tag=hibit-geodetect
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'hibit');

        $this->publishes([
            __DIR__ . '/../../resources/lang/en/' => $this->app->langPath('en'),
            __DIR__ . '/../../resources/lang/es/' => $this->app->langPath('es'),
        ], 'hibit-geodetect');
    }
}
