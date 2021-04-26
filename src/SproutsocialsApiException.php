<?php


namespace ThinkOne\LaravelSproutsocialsApi;

use Illuminate\Http\Client\Response;

class SproutsocialsApiException extends \Exception
{
    protected Response $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
        $error = $this->response->json('error', '');
        if (! $error) {
            $error = $this->response->json('message', '');
        }

        parent::__construct("Api returned error: \"{$error}\". Meta: {$this->getResponseApiVersion()}|{$this->getResponseServerVersion()}|{$this->getResponseUUID()}", $response->status());
    }


    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return Response
     */
    public function getResponseUUID(): string
    {
        return (string)$this->response->header('X-Sprout-Request-ID');
    }

    /**
     * @return Response
     */
    public function getResponseServerVersion(): string
    {
        return (string)$this->response->header('X-Sprout-Server-Version');
    }

    /**
     * @return Response
     */
    public function getResponseApiVersion(): string
    {
        return (string)$this->response->header('X-Sprout-API-Version');
    }
}
