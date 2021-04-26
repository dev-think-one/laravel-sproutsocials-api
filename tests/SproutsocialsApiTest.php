<?php

namespace ThinkOne\LaravelSproutsocialsApi\Tests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use ThinkOne\LaravelSproutsocialsApi\Facades\SproutsocialsApi;
use ThinkOne\LaravelSproutsocialsApi\NotSetCustomerException;
use ThinkOne\LaravelSproutsocialsApi\RequestGroups\Analytics;
use ThinkOne\LaravelSproutsocialsApi\SproutsocialsApiException;

class SproutsocialsApiTest extends TestCase
{

    /** @test */
    public function has_getters()
    {
        $this->assertInstanceOf(PendingRequest::class, SproutsocialsApi::client());
        $this->assertInstanceOf(\ThinkOne\LaravelSproutsocialsApi\SproutsocialsApi::class, SproutsocialsApi::instance());
        $this->assertIsArray(SproutsocialsApi::defaultPostMetrics());
    }

    /** @test */
    public function has_not_default_customer_id()
    {
        $this->app['config']->set('sproutsocials-api.http.customer_id', null);
        $this->expectException(NotSetCustomerException::class);
        SproutsocialsApi::defaultCustomerId();
    }

    /** @test */
    public function has_default_customer_id()
    {
        $this->assertEquals(22, SproutsocialsApi::defaultCustomerId());
    }

    /** @test */
    public function call_api()
    {
        Http::fake();
        $response = SproutsocialsApi::delete('');
        $this->assertInstanceOf(Response::class, $response);
        $response = SproutsocialsApi::put('');
        $this->assertInstanceOf(Response::class, $response);
        $response = SproutsocialsApi::patch('');
        $this->assertInstanceOf(Response::class, $response);
        $response = SproutsocialsApi::post('');
        $this->assertInstanceOf(Response::class, $response);
        $response = SproutsocialsApi::head('');
        $this->assertInstanceOf(Response::class, $response);
        $response = SproutsocialsApi::get('');
        $this->assertInstanceOf(Response::class, $response);
    }

    /** @test */
    public function call_api_exception()
    {
        Http::fake(function ($request) {
            return Http::response('Hello World', 500);
        });

        $this->expectException(SproutsocialsApiException::class);
        SproutsocialsApi::get('');
    }

    /** @test */
    public function endpoint_group()
    {
        $this->assertInstanceOf(Analytics::class, SproutsocialsApi::endpointGroup(Analytics::class));
    }
}
