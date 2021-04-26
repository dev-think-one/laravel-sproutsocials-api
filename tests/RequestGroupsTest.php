<?php


namespace ThinkOne\LaravelSproutsocialsApi\Tests;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use ThinkOne\LaravelSproutsocialsApi\Facades\SproutsocialsApi;
use ThinkOne\LaravelSproutsocialsApi\RequestGroups\Analytics;
use ThinkOne\LaravelSproutsocialsApi\RequestGroups\Metadata;

class RequestGroupsTest extends TestCase
{

    /** @test */
    public function analytics_has_endpoints()
    {
        Http::fake();

        /** @var Analytics $endpoint */
        $endpoint = SproutsocialsApi::endpointGroup(Analytics::class);

        $this->assertInstanceOf(Response::class, $endpoint->getProfiles());
        $this->assertInstanceOf(Response::class, $endpoint->getPosts());
    }

    /** @test */
    public function metadata_has_endpoints()
    {
        Http::fake();

        /** @var Metadata $endpoint */
        $endpoint = SproutsocialsApi::endpointGroup(Metadata::class);

        $this->assertInstanceOf(Response::class, $endpoint->getClient());
        $this->assertInstanceOf(Response::class, $endpoint->getCustomers());
        $this->assertInstanceOf(Response::class, $endpoint->getTags());
        $this->assertInstanceOf(Response::class, $endpoint->getGroups());
    }

    /** @test */
    public function api_client()
    {
        Http::fake();

        /** @var Metadata $endpoint */
        $endpoint = SproutsocialsApi::endpointGroup(Metadata::class);

        $this->assertInstanceOf(\ThinkOne\LaravelSproutsocialsApi\SproutsocialsApi::class, $endpoint->apiClient());
    }

    /** @test */
    public function customer_id()
    {
        Http::fake();

        /** @var Metadata $endpoint */
        $endpoint = SproutsocialsApi::endpointGroup(Metadata::class);

        $this->assertEquals(33, $endpoint->customerId(33));

        $this->assertEquals(22, $endpoint->customerId('str'));
    }
}
