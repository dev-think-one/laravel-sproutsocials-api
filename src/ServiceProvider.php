<?php

namespace ThinkOne\LaravelSproutsocialsApi;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @codeCoverageIgnore
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sproutsocials-api.php' => config_path('sproutsocials-api.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     * @codeCoverageIgnore
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sproutsocials-api.php', 'sproutsocials-api');

        $this->app->bind('sproutsocials-api', function () {
            return new SproutsocialsApi(config('sproutsocials-api.http'));
        });
    }
}
