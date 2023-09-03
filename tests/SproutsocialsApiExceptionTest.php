<?php


namespace ThinkOne\LaravelSproutsocialsApi\Tests;

use Illuminate\Http\Client\Response;
use ThinkOne\LaravelSproutsocialsApi\SproutsocialsApiException;

class SproutsocialsApiExceptionTest extends TestCase
{

    /** @test */
    public function has_response()
    {
        /** @var Response $spy */
        $spy       = $this->spy(Response::class);
        $exception = new SproutsocialsApiException($spy);

        $this->assertEquals($spy, $exception->getResponse());
    }
}
