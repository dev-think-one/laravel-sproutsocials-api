<?php


namespace ThinkOne\LaravelSproutsocialsApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SproutsocialsApi
 * @package ThinkOne\LaravelSproutsocialsApi\Facades
 * \ThinkOne\LaravelSproutsocialsApi\Facades\SproutsocialsApi
 */
class SproutsocialsApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sproutsocials-api';
    }
}
