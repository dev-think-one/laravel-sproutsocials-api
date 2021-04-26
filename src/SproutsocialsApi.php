<?php


namespace ThinkOne\LaravelSproutsocialsApi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use ThinkOne\LaravelSproutsocialsApi\RequestGroups\AbstractRequestGroup;

class SproutsocialsApi
{
    /**
     * @var PendingRequest
     */
    protected PendingRequest $client;

    /**
     * @var string|mixed
     */
    protected string $urlPrefix = '';

    /**
     * @var int|null
     */
    protected ?int $defaultCustomerId = null;

    /**
     * @var array
     */
    protected array $defaultPostMetrics = [];

    /**
     * @var AbstractRequestGroup[]
     */
    protected array $cachedGroups = [];

    /**
     * SproutsocialsApi constructor.
     *
     * @param array $configs
     */
    public function __construct(array $configs)
    {
        $this->urlPrefix = $configs['api_version'] ?? '';

        if ($customerId = (int)$configs['customer_id']) {
            $this->defaultCustomerId = $customerId;
        }

        $this->client = Http::baseUrl(Arr::get($configs, 'api_url'))
            ->withToken(Arr::get($configs, 'api_token'))
            ->withOptions(Arr::get($configs, 'request_options', []));
    }

    /**
     * Return current instance
     * @return $this
     */
    public function instance(): self
    {
        return $this;
    }

    /**
     * Return current client
     * @return $this
     */
    public function client(): PendingRequest
    {
        return $this->client;
    }

    /**
     * Get endpoint group by classname
     * @param string $class
     * @return AbstractRequestGroup
     */
    public function endpointGroup(string $class): AbstractRequestGroup
    {
        return ($this->cachedGroups[$class]) ?? ($this->cachedGroups[$class] = new $class($this));
    }

    /**
     * GET request
     * @param string $url
     * @param array $query
     *
     * @return Response
     * @throws SproutsocialsApiException
     */
    public function get(string $url, array $query = []): Response
    {
        return $this->call(__FUNCTION__, $url, $query);
    }


    /**
     * HEAD request
     * @param string $url
     * @param array $query
     *
     * @return Response
     * @throws SproutsocialsApiException
     */
    public function head(string $url, array $query = []): Response
    {
        return $this->call(__FUNCTION__, $url, $query);
    }

    /**
     * POST request
     * @param string $url
     * @param array $data
     *
     * @return Response
     * @throws SproutsocialsApiException
     */
    public function post(string $url, array $data = []): Response
    {
        return $this->call(__FUNCTION__, $url, $data);
    }

    /**
     * PATCH request
     * @param string $url
     * @param array $data
     *
     * @return Response
     * @throws SproutsocialsApiException
     */
    public function patch(string $url, array $data = []): Response
    {
        return $this->call(__FUNCTION__, $url, $data);
    }

    /**
     * PUT request
     * @param string $url
     * @param array $data
     *
     * @return Response
     * @throws SproutsocialsApiException
     */
    public function put(string $url, array $data = []): Response
    {
        return $this->call(__FUNCTION__, $url, $data);
    }

    /**
     * DELETE request
     * @param string $url
     * @param array $data
     *
     * @return Response
     * @throws SproutsocialsApiException
     */
    public function delete(string $url, array $data = []): Response
    {
        return $this->call(__FUNCTION__, $url, $data);
    }

    /**
     * Call api endpoint
     * @param string $method
     * @param string $url
     * @param array $data
     * @return Response
     * @throws SproutsocialsApiException
     */
    protected function call(string $method, string $url, array $data = []): Response
    {
        $callUrl = trim($url, '/');
        if ($this->urlPrefix) {
            $callUrl = trim($this->urlPrefix, '/') . '/' . $callUrl;
        }

        $method = strtolower($method);
        $response = $this->client->{$method}($callUrl, $data);

        if ($response->ok()) {
            return $response;
        }

        throw new SproutsocialsApiException($response);
    }

    /**
     * Get default customer ID from configuration
     * @return int
     * @throws NotSetCustomerException
     */
    public function defaultCustomerId(): int
    {
        if (! $this->defaultCustomerId) {
            throw new NotSetCustomerException('Default Customer Id not set');
        }

        return (int)$this->defaultCustomerId;
    }

    /**
     * Get default post metrics
     * @return array
     */
    public function defaultPostMetrics(): array
    {
        if (empty($this->defaultPostMetrics)) {
            $this->defaultPostMetrics = array_values(array_unique(array_merge(
                config('sproutsocials-api.metrics.post.instagram'),
                config('sproutsocials-api.metrics.post.linkedin'),
                config('sproutsocials-api.metrics.post.facebook'),
                config('sproutsocials-api.metrics.post.twitter'),
            )));
        }

        return $this->defaultPostMetrics;
    }
}
