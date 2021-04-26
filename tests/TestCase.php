<?php

namespace ThinkOne\LaravelSproutsocialsApi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            \ThinkOne\LaravelSproutsocialsApi\ServiceProvider::class,
        ];
    }

    public function defineEnvironment($app)
    {
        $app['config']->set('sproutsocials-api.http.api_token', 'some_api_token');
        $app['config']->set('sproutsocials-api.http.customer_id', '22');
    }
}
