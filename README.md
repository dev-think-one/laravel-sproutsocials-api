# Sproutsocial API client (https://api.sproutsocial.com/docs/)

![Packagist License](https://img.shields.io/packagist/l/think.studio/laravel-sproutsocials-api?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/think.studio/laravel-sproutsocials-api)](https://packagist.org/packages/think.studio/laravel-sproutsocials-api)
[![Total Downloads](https://img.shields.io/packagist/dt/think.studio/laravel-sproutsocials-api)](https://packagist.org/packages/think.studio/laravel-sproutsocials-api)
[![Build Status](https://scrutinizer-ci.com/g/dev-think-one/laravel-sproutsocials-api/badges/build.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/laravel-sproutsocials-api/build-status/main)
[![Code Coverage](https://scrutinizer-ci.com/g/dev-think-one/laravel-sproutsocials-api/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/laravel-sproutsocials-api/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dev-think-one/laravel-sproutsocials-api/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/laravel-sproutsocials-api/?branch=main)

## Installation

You can install the package via composer:

```shell
composer require think.studio/laravel-sproutsocials-api
# optional publish configs
php artisan vendor:publish --provider="ThinkOne\LaravelSproutsocialsApi\ServiceProvider" --tag="config"
```

## Usage

```php
/** @var Metadata $endpoint */
$endpoint = SproutsocialsApi::endpointGroup(Metadata::class);
$response = $endpoint->getTags($customerId);
if($response->successful()) {
    $tags = $response->json('data');
}
```

```php
/** @var Analytics $endpoint */
$endpoint = SproutsocialsApi::endpointGroup(Analytics::class);
$response = $endpoint->getPosts($requestData);
if($response->successful()) {
    $posts = $response->json('data');
}
```


## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/)
