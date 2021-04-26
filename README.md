# Sproutsocial API client (https://api.sproutsocial.com/docs/)

## Installation

You can install the package via composer:

```bash
composer require yaroslawww/laravel-sproutsocials-api
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
